<?php
/**
 * EdumapController Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('EdumapAppControllerTest', 'Edumap.Test/Case/Controller');
App::uses('EdumapController', 'Edumap.Controller');
App::uses('NetCommonsFrameComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsBlockComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsRoomRoleComponent', 'NetCommons.Controller/Component');

/**
 * EdumapController Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerTest extends EdumapAppControllerTest {

/**
 * mock controller object
 *
 * @var null
 */
	public $Controller = null;



/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		Configure::write('Config.language', 'ja');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		Configure::write('Config.language', null);
		parent::tearDown();
	}

/**
 * testBeforeFilterByNoSetFrameId method
 *
 * @return void
 */
	public function testBeforeFilterByNoSetFrameId() {
		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap/index', array('method' => 'get'));
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction('/edumap/edumap/index/1', array('method' => 'get'));

		$expected = 'Lorem ipsum dolor sit amet';
		$this->assertTextContains($expected, $this->view);
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->testAction('/edumap/edumap/view/1', array('method' => 'get'));

		$expected = 'Lorem ipsum dolor sit amet';
		$this->assertTextContains($expected, $this->view);
	}

/**
 * testViewByNoSetBlockId method
 *
 * @return void
 */
	public function testViewByNoSetBlockId() {
		$this->testAction('/edumap/edumap/view/2', array('method' => 'get'));
		$this->assertEmpty(trim($this->view),$this->view);
	}

}
