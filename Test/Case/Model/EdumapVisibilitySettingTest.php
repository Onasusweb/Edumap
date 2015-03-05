<?php
/**
 * EdumapVisibilitySetting Model Test Case
 *
 * @property EdumapVisibilitySetting $EdumapVisibilitySetting
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestBase', 'Edumap.Test/Case/Model');
App::uses('EdumapVisibilitySetting', 'Edumap.Model');

/**
 * EdumapVisibilitySetting Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapVisibilitySettingTest extends EdumapModelTestBase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EdumapVisibilitySetting = ClassRegistry::init('Edumap.EdumapVisibilitySetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EdumapVisibilitySetting);
		parent::tearDown();
	}

}
