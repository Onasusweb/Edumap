<?php
/**
 * EdumapController Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */
 
 App::uses('EdumapController', 'Edumap.Controller');
App::uses('EdumapAppControllerTest', 'Edumap.Test/Case/Controller');

 /**
 * Summary for EdumapController Test Case
 */
class EdumapControllerErrorTest extends EdumapAppControllerTest {

/**
 * testNCFrameError method
 *
 * @return void
 */

	public function testNCFrameError() {
		$this->setExpectedException('ForbiddenException');
		$this->_generateController('Edumap.Edumap', array(
			'components' => array('NetCommons.NetCommonsFrame'),
		));
		$this->_setComponentError('NetCommonsFrame', 'setView');
		$this->testAction('/edumap/edumap/index/1', array('method' => 'get'));
	}
	
/**
 * testNCRoomRoleError method
 *
 * @return void
 */
	public function testNCRoomRoleError() {
		$this->setExpectedException('ForbiddenException');
		$this->_generateController('Edumap.Edumap', array(
			'components' => array('NetCommons.NetCommonsRoomRole'),
		));
		$this->_setComponentError('NetCommonsRoomRole', 'setView');
		$this->testAction('/edumap/edumap/index/1', array('method' => 'get'));
	}
}

