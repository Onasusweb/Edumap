<?php
/**
 * EdumapEditController Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('EdumapEditController', 'Edumap.Controller');
App::uses('EdumapAppControllerTest', 'Edumap.Test/Case/Controller');

/**
 * Summary for EdumapEditController Test Case
 */
class EdumapEditControllerTest extends EdumapAppControllerTest {

/**
 * testBeforeFilterErrorByNoEditable method
 *
 * @return void
 */
	public function testBeforeFilterErrorByNoEditable() {
		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap_edit/index/1', array('method' => 'get'));
	}
}