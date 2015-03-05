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
App::uses('EdumapControllerTestBase', 'Edumap.Test/Case/Controller');

/**
 * EdumapController Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerTest extends EdumapControllerTestBase {

/**
 * Expect visitor can access index action
 *
 * @return void
 */
	//public function testIndex() {
	//	$this->testAction(
	//		'/announcements/announcements/index/1',
	//		array(
	//			'method' => 'get',
	//			'return' => 'view',
	//		)
	//	);
	//	$this->assertTextEquals('Edumap/view', $this->controller->view);
	//}

/**
 * Expect visitor can access view action
 *
 * @return void
 */
	//public function testView() {
	//	$this->testAction(
	//		'/announcements/announcements/view/1',
	//		array(
	//			'method' => 'get',
	//			'return' => 'view',
	//		)
	//	);
	//	$this->assertTextEquals('view', $this->controller->view);
	//}

/**
 * Expect visitor can access view action by json
 *
 * @return void
 */
	//public function testViewJson() {
	//	$ret = $this->testAction(
	//		'/announcements/announcements/view/1.json',
	//		array(
	//			'method' => 'get',
	//			'type' => 'json',
	//			'return' => 'contents',
	//		)
	//	);
	//	$result = json_decode($ret, true);
	//
	//	$this->assertTextEquals('view', $this->controller->view);
	//	$this->assertArrayHasKey('code', $result, print_r($result, true));
	//	$this->assertEquals(200, $result['code'], print_r($result, true));
	//}

/**
 * Expect admin user can access view action
 *
 * @return void
 */
	//public function testViewByAdmin() {
	//	$this->_generateController('Edumap.Edumap');
	//	RolesControllerTest::login();
	//
	//	$view = $this->testAction(
	//		'/announcements/announcements/view/1',
	//		array(
	//			'method' => 'get',
	//			'return' => 'view',
	//		)
	//	);
	//
	//	$this->assertTextContains('nc-announcements-1', $view, print_r($view, true));
	//	$this->assertTextContains('ng-controller="Edumap"', $view, print_r($view, true));
	//
	//	$this->_logout();
	//}

/**
 * Expect user cannot access view action with unknown frame id
 *
 * @return void
 */
	//public function testViewByUnkownFrameId() {
	//	$this->setExpectedException('InternalErrorException');
	//	$this->testAction(
	//		'/announcements/announcements/view/999',
	//		array(
	//			'method' => 'get',
	//			'return' => 'view',
	//		)
	//	);
	//}

/**
 * Expect admin user can access edit action
 *
 * @return void
 */
	//public function testEditGet() {
	//	$this->_generateController('Edumap.Edumap');
	//	RolesControllerTest::login();
	//
	//	$this->testAction(
	//		'/announcements/announcements/edit/1',
	//		array(
	//			'method' => 'get',
	//			'return' => 'contents'
	//		)
	//	);
	//
	//	$this->assertTextEquals('edit', $this->controller->view);
	//
	//	$this->_logout();
	//}

/**
 * Expect view action to be successfully handled w/ null frame.block_id
 * This situation typically occur after placing new plugin into page
 *
 * @return void
 */
	//public function testAddFrameWithoutBlock() {
	//	$this->testAction(
	//		'/announcements/announcements/view/3',
	//		array(
	//			'method' => 'get',
	//			'return' => 'contents'
	//		)
	//	);
	//	$this->assertTextEquals('view', $this->controller->view);
	//}

/**
 * Expect admin user can publish announcements
 *
 * @return void
 */
	//public function testEditPost() {
	//	$this->_generateController('Edumap.Edumap');
	//	RolesControllerTest::login();
	//
	//	$data = array(
	//		'Announcement' => array(
	//			'block_id' => '1',
	//			'key' => 'announcement_1',
	//			'content' => 'edit content',
	//		),
	//		'Frame' => array(
	//			'id' => '1'
	//		),
	//		'Comment' => array(
	//			'comment' => 'edit comment',
	//		),
	//		sprintf('save_%s', NetCommonsBlockComponent::STATUS_PUBLISHED) => '',
	//	);
	//
	//	$this->testAction(
	//		'/announcements/announcements/edit/1',
	//		array(
	//			'method' => 'post',
	//			'data' => $data,
	//			'return' => 'contents'
	//		)
	//	);
	//	$this->assertTextEquals('edit', $this->controller->view);
	//}

}
