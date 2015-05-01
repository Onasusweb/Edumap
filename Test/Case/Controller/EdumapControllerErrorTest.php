<?php
/**
 * EdumapController Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapController', 'Edumap.Controller');
App::uses('EdumapControllerTestCase', 'Edumap.Test/Case/Controller');

/**
 * EdumapController Error Test Case w/o model based validation errors
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerErrorTest extends EdumapControllerTestCase {

/**
 * default value
 *
 * @var array
 */
	private $__saveDefault = array(
		'Edumap' => array(
			'name' => 'Edit name',
			'name_kana' => 'Edit name_kana',
			'handle' => 'Edit handle',
			'postal_code' => '123-4567',
			'prefecture_code' => '01',
			'location' => 'Edit location',
			'tel' => '01-2345-6789',
			'fax' => '09-8765-4321',
			'emergency_email' => 'emergency@example.com',
			'inquiry' => 'Edit inquiry',
			'site_url' => 'http://site.example.com',
			'rss_url' => 'http://rss.example.com',
			'foundation_date' => array('year' => '1945', 'month' => '12'),
			'closed_date' => array('year' => '2015', 'month' => '04'),
			'governor_type' => '3',
			'education_type' => '4',
			'coeducation_type' => '2',
			'principal_name' => 'Edit principal_name',
			'principal_email' => 'principal@example.com',
			'description' => 'Edit description',
		),
		'EdumapSocialMedium' => array(
			EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
				'value' => 'EditTwitterValue',
				'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
			)
		),
		'EdumapStudent' => array(
				array('grade' => '1', 'gendar' => false, 'number' => ''),
				array('grade' => '1', 'gendar' => true, 'number' => ''),
				array('grade' => '2', 'gendar' => false, 'number' => '123'),
				array('grade' => '2', 'gendar' => true, 'number' => '456'),
				array('grade' => '3', 'gendar' => false, 'number' => '789'),
				array('grade' => '3', 'gendar' => true, 'number' => ''),
				array('grade' => '4', 'gendar' => false, 'number' => ''),
				array('grade' => '4', 'gendar' => true, 'number' => '654'),
				array('grade' => '5', 'gendar' => false, 'number' => ''),
				array('grade' => '5', 'gendar' => true, 'number' => ''),
				array('grade' => '6', 'gendar' => false, 'number' => ''),
				array('grade' => '6', 'gendar' => true, 'number' => ''),
		),
		'Comment' => array(
			'comment' => 'Edit comment'
		),
		Edumap::AVATAR_INPUT => array(
			'FilesPlugin' => array(
				'plugin_key' => 'edumap'
			),
			'FilesRoom' => array(
				'room_id' => 1
			),
			'FilesUser' => array(
				'user_id' => 1
			),
		),
		'DeleteFile' => array(array('File' => array('id' => '0')))
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		$this->generate(
			'Edumap.Edumap',
			[
				'components' => [
					'Auth' => ['user'],
					'Session',
					'Security',
				]
			]
		);
		parent::setUp();
	}

/**
 * Expect unauthenticated user cannot view edit action
 *
 * @return void
 */
	public function testEditLoginError() {
		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap/edit/121.json', array('method' => 'get'));
	}

/**
 * Expect visitor cannot view edit action
 *
 * @return void
 */
	public function testContentEditableError() {
		$this->setExpectedException('ForbiddenException');

		RolesControllerTest::login($this, Role::ROLE_KEY_VISITOR);

		$this->testAction('/edumap/edumap/edit/121.json', array('method' => 'get'));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect editor cannot publish edumap
 *
 * @return void
 */
	public function testEditContentPublishedError() {
		RolesControllerTest::login($this, Role::ROLE_KEY_EDITOR);

		//データ生成
		$frameId = 121;
		$blockId = 121;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'id' => '',
					'key' => 'edumap_1',
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_PUBLISHED) => ''
			)
		);

		//テスト実行
		$view = $this->testAction(
			'/edumap/edumap/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'type' => 'json',
				'data' => $data,
				'return' => 'contents'
			)
		);

		$result = json_decode($view, true);
		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect editor cannot disapprove edumap
 *
 * @return void
 */
	public function testEditContentDisapprovedError() {
		RolesControllerTest::login($this, Role::ROLE_KEY_EDITOR);

		//データ生成
		$frameId = 121;
		$blockId = 121;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'id' => '',
					'key' => 'edumap_1',
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_DISAPPROVED) => ''
			)
		);

		//テスト実行
		$view = $this->testAction(
			'/edumap/edumap/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'type' => 'json',
				'data' => $data,
				'return' => 'contents'
			)
		);

		$result = json_decode($view, true);
		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}
}
