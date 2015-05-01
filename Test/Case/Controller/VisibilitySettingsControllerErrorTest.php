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

App::uses('VisibilitySettingsController', 'Edumap.Controller');
App::uses('EdumapControllerTestCase', 'Edumap.Test/Case/Controller');

/**
 * EdumapController Error Test Case w/o model based validation errors
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class VisibilitySettingsControllerErrorTest extends EdumapControllerTestCase {

/**
 * default value
 *
 * @var array
 */
	private $__saveDefault = array(
		'EdumapVisibilitySetting' => array(
			'file' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'name_kana' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'handle' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'postal_code' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'prefecture' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'location' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'tel' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'fax' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'emergency_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'inquiry' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'site_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'rss_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'foundation_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'closed_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'governor_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'education_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'coeducation_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'principal_name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'principal_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'student_number' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'social_media' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'description' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
		),
		'save' => ''
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		$this->generate(
			'Edumap.VisibilitySettings',
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
		$this->testAction('/edumap/visibilitySettings/edit/1.json', array('method' => 'get'));
	}

/**
 * Expect visitor cannot view edit action
 *
 * @return void
 */
	public function testContentEditableError() {
		$this->setExpectedException('ForbiddenException');

		RolesControllerTest::login($this, Role::ROLE_KEY_VISITOR);

		$this->testAction('/edumap/visibilitySettings/edit/121.json', array('method' => 'get'));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect editor cannot publish edumap
 *
 * @return void
 */
	public function testEditContentPublishedError() {
		$this->setExpectedException('ForbiddenException');

		RolesControllerTest::login($this, Role::ROLE_KEY_EDITOR);

		//データ生成
		$frameId = 121;
		$blockId = 121;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'EdumapVisibilitySetting' => array(
					'id' => '1',
					'edumap_key' => 'edumap_1',
				),
			)
		);

		//テスト実行
		$this->testAction(
			'/edumap/visibilitySettings/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'type' => 'json',
				'data' => $data,
				'return' => 'contents'
			)
		);

		AuthGeneralControllerTest::logout($this);
	}
}
