<?php
/**
 * EdumapHelper Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('View', 'View');
App::uses('EdumapHelper', 'Edumap.View/Helper');

/**
 * Summary for EdumapHelper Test Case
 */
class EdumapHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$view = new View();
		$this->Edumap = new EdumapHelper($view);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Edumap);
		parent::tearDown();
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->assertTrue(true);
	}
}
