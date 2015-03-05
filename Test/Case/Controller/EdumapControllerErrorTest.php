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
 * EdumapController Error Test Case w/o model based validation errors
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerErrorTest extends EdumapControllerTestBase {

/**
 * Expect unauthenticated user cannot view edit action
 *
 * @return void
 */
	//public function testEditLoginError() {
	//	$this->setExpectedException('ForbiddenException');
	//	$this->testAction('/announcements/announcements/edit/1.json', array('method' => 'get'));
	//}

/**
 * Expect visitor cannot view edit action
 *
 * @return void
 */
	//public function testContentEditableError() {
	//	$this->setExpectedException('ForbiddenException');
	//
	//	$this->_generateController('Edumap.Edumap');
	//	$this->_loginVisitor();
	//
	//	$this->testAction('/announcements/announcements/edit/1.json', array('method' => 'get'));
	//
	//	/* $this->_logout(); */
	//}

/**
 * Expect editor cannot publish announcement
 *
 * @return void
 */
	//public function testEditContentPublishedError() {
	//	$this->_generateController('Edumap.Edumap');
	//	$this->_loginEditor();
	//
	//	$postData = array(
	//		'Announcement' => array(
	//			'block_id' => '1',
	//			'key' => 'announcement_1',
	//			'content' => 'edit content',
	//		),
	//		'Comment' => array(
	//			'comment' => 'edit comment',
	//		),
	//		'Frame' => array(
	//			'id' => '1'
	//		),
	//		sprintf('save_%s', NetCommonsBlockComponent::STATUS_PUBLISHED) => '',
	//	);
	//
	//	$view = $this->testAction(
	//			'/announcements/announcements/edit/1.json',
	//			array(
	//				'method' => 'post',
	//				'type' => 'json',
	//				'data' => $postData,
	//				'return' => 'contents'
	//			)
	//		);
	//
	//	$result = json_decode($view, true);
	//	$this->assertArrayHasKey('code', $result, print_r($result, true));
	//	$this->assertEquals(400, $result['code'], print_r($result, true));
	//
	//	/* $this->_logout(); */
	//}

/**
 * Expect editor cannot disapprove announcement
 *
 * @return void
 */
	//public function testEditContentDisapprovedError() {
	//	$this->_generateController('Edumap.Edumap');
	//	$this->_loginEditor();
	//
	//	$postData = array(
	//		'Announcement' => array(
	//			'block_id' => '1',
	//			'key' => 'announcement_1',
	//			'content' => 'edit content',
	//		),
	//		'Comment' => array(
	//			'comment' => 'edit comment',
	//		),
	//		'Frame' => array(
	//			'id' => '1'
	//		),
	//		sprintf('save_%s', NetCommonsBlockComponent::STATUS_DISAPPROVED) => '',
	//	);
	//
	//	$view = $this->testAction(
	//			'/announcements/announcements/edit/1.json',
	//			array(
	//				'method' => 'post',
	//				'type' => 'json',
	//				'data' => $postData,
	//				'return' => 'contents'
	//			)
	//		);
	//	$result = json_decode($view, true);
	//	$this->assertArrayHasKey('code', $result, print_r($result, true));
	//	$this->assertEquals(400, $result['code'], print_r($result, true));
	//
	//	/* $this->_logout(); */
	//}
}
