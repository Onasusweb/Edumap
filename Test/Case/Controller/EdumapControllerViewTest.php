<?php
/**
 * Test of EdumapController->view()
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
 * Test of EdumapController->view()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerViewTest extends EdumapControllerTestBase {

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
 * Expect visitor can access view action
 *
 * @return void
 */
	public function testView() {
		//$this->testAction(
		//	'/edumap/edumap/view/121',
		//	array(
		//		'method' => 'get',
		//		'return' => 'view',
		//	)
		//);
		//
		//$this->assertTextEquals('view', $this->controller->view);
	}

/**
 * Expect visitor can access view action by json
 *
 * @return void
 */
	public function testViewJson() {
		//$ret = $this->testAction(
		//	'/edumap/edumap/view/121.json',
		//	array(
		//		'method' => 'get',
		//		'type' => 'json',
		//		'return' => 'contents',
		//	)
		//);
		//$result = json_decode($ret, true);
		//
		//$this->assertTextEquals('view', $this->controller->view);
		//$this->assertArrayHasKey('code', $result, print_r($result, true));
		//$this->assertEquals(200, $result['code'], print_r($result, true));
	}

/**
 * Expect admin user can access view action
 *
 * @return void
 */
	public function testViewByAdmin() {
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
		//$view = $this->testAction(
		//	'/edumap/edumap/view/121',
		//	array(
		//		'method' => 'get',
		//		'return' => 'view',
		//	)
		//);
		//
		//$this->assertTextEquals('view', $this->controller->view);
		////$this->assertTextContains('nc-edumap-121', $view, print_r($view, true));
		//$this->assertTextContains('/edumap/edumap/edit/121', $view, print_r($view, true));
		//
		//$folder->delete(TMP . 'tests' . DS . 'file');
		//AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot access view action with unknown frame id
 *
 * @return void
 */
	public function testViewByUnkownFrameId() {
		//$this->setExpectedException('InternalErrorException');
		//$this->testAction(
		//	'/edumap/edumap/view/999',
		//	array(
		//		'method' => 'get',
		//		'return' => 'view',
		//	)
		//);
	}

/**
 * Expect view action to be successfully handled w/ null frame.block_id
 * This situation typically occur after placing new plugin into page
 *
 * @return void
 */
	public function testViewWithoutBlock() {
		//$this->testAction(
		//	'/edumap/edumap/view/123',
		//	array(
		//		'method' => 'get',
		//		'return' => 'contents'
		//	)
		//);
		//$this->assertTextEquals('view', $this->controller->view);
	}

}
