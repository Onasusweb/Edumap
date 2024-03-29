<?php
/**
 * Test of EdumapVisibilitySettingsController->edit()
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapVisibilitySettingsController', 'Edumap.Controller');
App::uses('EdumapControllerTestBase', 'Edumap.Test/Case/Controller');

/**
 * Test of EdumapVisibilitySettingsController->edit()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class EdumapVisibilitySettingsControllerEditTest extends EdumapControllerTestBase {

/**
 * default value
 *
 * @var array
 */
	//private $__saveDefault = array(
	//	'EdumapVisibilitySetting' => array(
	//		'file' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'name_kana' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'handle' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'postal_code' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'prefecture' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'location' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'tel' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'fax' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'emergency_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'inquiry' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'site_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'rss_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'foundation_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'closed_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'governor_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'education_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'coeducation_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'principal_name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'principal_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'student_number' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'social_media' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'description' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//	),
	//	'save' => ''
	//);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//$this->generate(
		//	'Edumap.EdumapVisibilitySettings',
		//	[
		//		'components' => [
		//			'Auth' => ['user'],
		//			'Session',
		//			'Security',
		//		]
		//	]
		//);
	}

/**
 * Expect admin user can access edit action
 *
 * @return void
 */
	public function testEditGet() {
		//RolesControllerTest::login($this);
		//
		//$frameId = '121';
		//$blockId = '121';
		//
		//$this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId,
		//	array(
		//		'method' => 'get',
		//		'return' => 'contents'
		//	)
		//);
		//$this->assertTextEquals('edit', $this->controller->view);
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect view action to be successfully handled w/ null frame.block_id
 * This situation typically occur after placing new plugin into page
 *
 * @return void
 */
	public function testEditGetWithoutBlock() {
		//$this->setExpectedException('BadRequestException');
		//
		//RolesControllerTest::login($this);
		//
		//$frameId = '123';
		//$blockId = '';
		//
		//$this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId,
		//	array(
		//		'method' => 'get',
		//		'return' => 'contents'
		//	)
		//);
		//$this->assertTextEquals('edit', $this->controller->view);
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user can publish edumap
 *
 * @return void
 */
	public function testEditPost() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//
		////登録処理実行
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => '1',
		//			'edumap_key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		//$this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId,
		//	array(
		//		'method' => 'post',
		//		'data' => $data,
		//		'return' => 'contents'
		//	)
		//);
		//$this->assertTextEquals('edit', $this->controller->view);
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user can publish edumap
 *
 * @return void
 */
	public function testEditPostWithoutBlock() {
		//$this->setExpectedException('BadRequestException');
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '123';
		//$blockId = '';
		//
		////登録処理実行
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => '',
		//			'edumap_key' => 'edumap_2',
		//		),
		//	)
		//);
		//
		//$this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId,
		//	array(
		//		'method' => 'post',
		//		'data' => $data,
		//		'return' => 'contents'
		//	)
		//);
		//$this->assertTextEquals('edit', $this->controller->view);
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testSaveEditErrorByEdumapKey() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => '1',
		//			'edumap_key' => '',
		//		),
		//	)
		//);
		//
		////テスト実行
		//$ret = $this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId . '.json',
		//	array(
		//		'method' => 'post',
		//		'data' => $data,
		//		'type' => 'json',
		//		'return' => 'contents'
		//	)
		//);
		//$result = json_decode($ret, true);
		//
		//$this->assertArrayHasKey('code', $result, print_r($result, true));
		//$this->assertEquals(400, $result['code'], print_r($result, true));
		//$this->assertArrayHasKey('name', $result, print_r($result, true));
		//$this->assertArrayHasKey('error', $result, print_r($result, true));
		//$this->assertArrayHasKey('validationErrors', $result['error'], print_r($result, true));
		//$this->assertArrayHasKey('edumapKey', $result['error']['validationErrors'], print_r($result, true));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testSaveEditErrorByUnknownEdumap() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '123';
		//$blockId = '123';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => '',
		//			'edumap_key' => '',
		//		),
		//	)
		//);
		//
		////テスト実行
		//$this->setExpectedException('BadRequestException');
		//$this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId,
		//	array(
		//		'method' => 'post',
		//		'data' => $data,
		//		'return' => 'contents'
		//	)
		//);
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testSaveEditErrorJsonByUnknownEdumap() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '123';
		//$blockId = '';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => '',
		//			'edumap_key' => '',
		//		),
		//	)
		//);
		//
		////テスト実行
		//$ret = $this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '.json',
		//	array(
		//		'method' => 'post',
		//		'data' => $data,
		//		'type' => 'json',
		//		'return' => 'contents'
		//	)
		//);
		//$result = json_decode($ret, true);
		//
		//$this->assertArrayHasKey('code', $result, print_r($result, true));
		//$this->assertEquals(400, $result['code'], print_r($result, true));
		//$this->assertArrayHasKey('name', $result, print_r($result, true));
		//$this->assertArrayHasKey('error', $result, print_r($result, true));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect unauthenticated user cannot view edit action
 *
 * @return void
 */
	public function testEditLoginError() {
		//$this->setExpectedException('ForbiddenException');
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$this->testAction('/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId . '.json', array('method' => 'get'));
	}

/**
 * Expect visitor cannot view edit action
 *
 * @return void
 */
	public function testContentEditableError() {
		//$this->setExpectedException('ForbiddenException');
		//
		//RolesControllerTest::login($this, Role::ROLE_KEY_VISITOR);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$this->testAction('/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId . '.json', array('method' => 'get'));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect editor cannot publish edumap
 *
 * @return void
 */
	public function testEditContentPublishedError() {
		//$this->setExpectedException('ForbiddenException');
		//
		//RolesControllerTest::login($this, Role::ROLE_KEY_EDITOR);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => '1',
		//			'edumap_key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////テスト実行
		//$this->testAction(
		//	'/edumap/edumap_visibility_settings/edit/' . $frameId . '/' . $blockId . '.json',
		//	array(
		//		'method' => 'post',
		//		'type' => 'json',
		//		'data' => $data,
		//		'return' => 'contents'
		//	)
		//);
		//
		//AuthGeneralControllerTest::logout($this);
	}

}
