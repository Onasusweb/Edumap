<?php
/**
 * Test of EdumapController->edit()
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapController', 'Edumap.Controller');
App::uses('EdumapControllerTestBase', 'Edumap.Test/Case/Controller');

/**
 * Test of EdumapController->edit()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class EdumapControllerEditTest extends EdumapControllerTestBase {

/**
 * default value
 *
 * @var array
 */
	//private $__saveDefault = array(
	//	'Edumap' => array(
	//		'file_id' => '0',
	//		'name' => 'Edit name',
	//		'name_kana' => 'Edit name_kana',
	//		'handle' => 'Edit handle',
	//		'postal_code' => '123-4567',
	//		'prefecture_code' => '01',
	//		'location' => 'Edit location',
	//		'tel' => '01-2345-6789',
	//		'fax' => '09-8765-4321',
	//		'emergency_email' => 'emergency@example.com',
	//		'inquiry' => 'Edit inquiry',
	//		'site_url' => 'http://site.example.com',
	//		'rss_url' => 'http://rss.example.com',
	//		'foundation_date' => array('year' => '1945', 'month' => '12'),
	//		'closed_date' => array('year' => '2015', 'month' => '04'),
	//		'governor_type' => '3',
	//		'education_type' => '4',
	//		'coeducation_type' => '2',
	//		'principal_name' => 'Edit principal_name',
	//		'principal_email' => 'principal@example.com',
	//		'description' => 'Edit description',
	//	),
	//	'EdumapSocialMedium' => array(
	//		EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
	//			'value' => 'EditTwitterValue',
	//			'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
	//		)
	//	),
	//	'EdumapStudent' => array(
	//			array('grade' => '1', 'gendar' => false, 'number' => ''),
	//			array('grade' => '1', 'gendar' => true, 'number' => ''),
	//			array('grade' => '2', 'gendar' => false, 'number' => '123'),
	//			array('grade' => '2', 'gendar' => true, 'number' => '456'),
	//			array('grade' => '3', 'gendar' => false, 'number' => '789'),
	//			array('grade' => '3', 'gendar' => true, 'number' => ''),
	//			array('grade' => '4', 'gendar' => false, 'number' => ''),
	//			array('grade' => '4', 'gendar' => true, 'number' => '654'),
	//			array('grade' => '5', 'gendar' => false, 'number' => ''),
	//			array('grade' => '5', 'gendar' => true, 'number' => ''),
	//			array('grade' => '6', 'gendar' => false, 'number' => ''),
	//			array('grade' => '6', 'gendar' => true, 'number' => ''),
	//	),
	//	'Comment' => array(
	//		'comment' => 'Edit comment'
	//	),
	//	Edumap::AVATAR_INPUT => array(
	//		'File' => array(
	//			'id' => ''
	//		),
	//		'FilesPlugin' => array(
	//			'plugin_key' => 'edumap'
	//		),
	//		'FilesRoom' => array(
	//			'room_id' => '1'
	//		),
	//		'FilesUser' => array(
	//			'user_id' => '1'
	//		),
	//	),
	//	'DeleteFile' => array(array('File' => array('id' => '0')))
	//);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		//$this->generate(
		//	'Edumap.Edumap',
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
		//$folder = new Folder();
		//$folder->create(TMP . 'tests' . DS . 'file' . DS . '1');
		//$file = new File(
		//	APP . 'Plugin' . DS . 'Files' . DS . 'Test' . DS . 'Fixture' . DS . 'logo.gif'
		//);
		//$file->copy(TMP . 'tests' . DS . 'file' . DS . '1' . DS . 'logo_hash.gif');
		//$file->copy(TMP . 'tests' . DS . 'file' . DS . '1' . DS . 'logo_hash_big.gif');
		//$file->copy(TMP . 'tests' . DS . 'file' . DS . '1' . DS . 'logo_hash_medium.gif');
		//$file->copy(TMP . 'tests' . DS . 'file' . DS . '1' . DS . 'logo_hash_small.gif');
		//$file->copy(TMP . 'tests' . DS . 'file' . DS . '1' . DS . 'logo_hash_thumbnail.gif');
		//$file->close();
		//
		//$this->testAction(
		//	'/edumap/edumap/edit/121',
		//	array(
		//		'method' => 'get',
		//		'return' => 'contents'
		//	)
		//);
		//$this->assertTextEquals('edit', $this->controller->view);
		//
		//$folder->delete(TMP . 'tests' . DS . 'file');
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user can access edit action
 *
 * @return void
 */
	public function testEditGetWithoutBlock() {
		//RolesControllerTest::login($this);
		//
		//$this->testAction(
		//	'/edumap/edumap/edit/123',
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
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//		),
		//		sprintf('save_%s', WorkflowComponent::STATUS_PUBLISHED) => ''
		//	)
		//);
		//
		////テスト実行
		//$this->testAction(
		//	'/edumap/edumap/edit/' . $frameId,
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
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '123';
		//$blockId = '';
		//$blockKey = '';
		//$roomId = '2';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_3',
		//		),
		//		sprintf('save_%s', WorkflowComponent::STATUS_PUBLISHED) => ''
		//	)
		//);
		//
		////テスト実行
		//$this->testAction(
		//	'/edumap/edumap/edit/' . $frameId,
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
	public function testEditPostUnknownInputs() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//			'foundation_date' => array('year' => '', 'month' => ''),
		//			'closed_date' => array('year' => '', 'month' => ''),
		//		),
		//		//'EdumapSocialMedium' => array(
		//		//	EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
		//		//		'value' => '',
		//		//	)
		//		//),
		//		sprintf('save_%s', WorkflowComponent::STATUS_PUBLISHED) => ''
		//	)
		//);
		//
		////テスト実行
		//$this->testAction(
		//	'/edumap/edumap/edit/' . $frameId,
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
 * Expect user cannot edit w/o valid edumap.status
 *
 * @return void
 */
	public function testEditWithInvalidStatus() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////テスト実行
		//$this->setExpectedException('BadRequestException');
		//$this->testAction(
		//	'/edumap/edumap/edit/' . $frameId,
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
 * Expect user cannot edit w/o valid edumap.status as ajax request
 *
 * @return void
 */
	public function testEditWithInvalidStatusJson() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////テスト実行
		//$ret = $this->testAction(
		//	'/edumap/edumap/edit/' . $frameId . '.json',
		//	array(
		//		'method' => 'post',
		//		'data' => $data,
		//		'type' => 'json',
		//		'return' => 'contents'
		//	)
		//);
		//$result = json_decode($ret, true);
		//$this->assertArrayHasKey('code', $result, print_r($result, true));
		//$this->assertEquals(400, $result['code'], print_r($result, true));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testEditNameError() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//			'name' => '',
		//		),
		//		sprintf('save_%s', WorkflowComponent::STATUS_APPROVED) => '',
		//	)
		//);
		//
		////テスト実行
		//$ret = $this->testAction(
		//	'/edumap/edumap/edit/' . $frameId . '.json',
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
		//$this->assertArrayHasKey('name', $result['error']['validationErrors'], print_r($result, true));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user cannot disapprove publish request from editor w/o comments.comment
 *
 * @return void
 */
	public function testEditCommentError() {
		//RolesControllerTest::login($this);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//		),
		//		'Comment' => array(
		//			'comment' => ''
		//		),
		//		sprintf('save_%s', WorkflowComponent::STATUS_DISAPPROVED) => '',
		//	)
		//);
		//
		////テスト実行
		//$ret = $this->testAction(
		//	'/edumap/edumap/edit/' . $frameId . '.json',
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
		//$this->testAction('/edumap/edumap/edit/121.json', array('method' => 'get'));
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
		//$this->testAction('/edumap/edumap/edit/121.json', array('method' => 'get'));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect editor cannot publish edumap
 *
 * @return void
 */
	public function testEditContentPublishedError() {
		//RolesControllerTest::login($this, Role::ROLE_KEY_EDITOR);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//		),
		//		sprintf('save_%s', WorkflowComponent::STATUS_PUBLISHED) => ''
		//	)
		//);
		//
		////テスト実行
		//$view = $this->testAction(
		//	'/edumap/edumap/edit/' . $frameId . '.json',
		//	array(
		//		'method' => 'post',
		//		'type' => 'json',
		//		'data' => $data,
		//		'return' => 'contents'
		//	)
		//);
		//
		//$result = json_decode($view, true);
		//$this->assertArrayHasKey('code', $result, print_r($result, true));
		//$this->assertEquals(400, $result['code'], print_r($result, true));
		//
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect editor cannot disapprove edumap
 *
 * @return void
 */
	public function testEditContentDisapprovedError() {
		//RolesControllerTest::login($this, Role::ROLE_KEY_EDITOR);
		//
		////データ生成
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'id' => '',
		//			'key' => 'edumap_1',
		//		),
		//		sprintf('save_%s', WorkflowComponent::STATUS_DISAPPROVED) => ''
		//	)
		//);
		//
		////テスト実行
		//$view = $this->testAction(
		//	'/edumap/edumap/edit/' . $frameId . '.json',
		//	array(
		//		'method' => 'post',
		//		'type' => 'json',
		//		'data' => $data,
		//		'return' => 'contents'
		//	)
		//);
		//
		//$result = json_decode($view, true);
		//$this->assertArrayHasKey('code', $result, print_r($result, true));
		//$this->assertEquals(400, $result['code'], print_r($result, true));
		//
		//AuthGeneralControllerTest::logout($this);
	}

}
