<?php
/**
 * AnnouncementEditController Test Case
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
 * EdumapController Validation Error Test Case based on models
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerValidateErrorTest extends EdumapControllerTestCase {

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
 * Expect user cannot edit w/o valid edumap.status
 *
 * @return void
 */
	public function testEditWithInvalidStatus() {
		RolesControllerTest::login($this);

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
			)
		);

		//テスト実行
		$this->setExpectedException('BadRequestException');
		$this->testAction(
			'/edumap/edumap/edit/' . $frameId,
			array(
				'method' => 'post',
				'data' => $data,
				'return' => 'contents'
			)
		);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid edumap.status as ajax request
 *
 * @return void
 */
	public function testEditWithInvalidStatusJson() {
		RolesControllerTest::login($this);

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
			)
		);

		//テスト実行
		$ret = $this->testAction(
			'/edumap/edumap/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'data' => $data,
				'type' => 'json',
				'return' => 'contents'
			)
		);
		$result = json_decode($ret, true);
		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testEditNameError() {
		RolesControllerTest::login($this);

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
					'name' => '',
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_APPROVED) => '',
			)
		);

		//テスト実行
		$ret = $this->testAction(
			'/edumap/edumap/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'data' => $data,
				'type' => 'json',
				'return' => 'contents'
			)
		);
		$result = json_decode($ret, true);

		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));
		$this->assertArrayHasKey('name', $result, print_r($result, true));
		$this->assertArrayHasKey('error', $result, print_r($result, true));
		$this->assertArrayHasKey('validationErrors', $result['error'], print_r($result, true));
		$this->assertArrayHasKey('name', $result['error']['validationErrors'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user cannot disapprove publish request from editor w/o comments.comment
 *
 * @return void
 */
	public function testEditCommentError() {
		RolesControllerTest::login($this);

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
				'Comment' => array(
					'comment' => ''
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_DISAPPROVED) => '',
			)
		);

		//テスト実行
		$ret = $this->testAction(
			'/edumap/edumap/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'data' => $data,
				'type' => 'json',
				'return' => 'contents'
			)
		);
		$result = json_decode($ret, true);

		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));
		$this->assertArrayHasKey('name', $result, print_r($result, true));
		$this->assertArrayHasKey('error', $result, print_r($result, true));
		$this->assertArrayHasKey('validationErrors', $result['error'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}

}
