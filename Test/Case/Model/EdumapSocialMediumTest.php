<?php
/**
 * EdumapSocialMedium Model Test Case
 *
 * @property EdumapSocialMedium $EdumapSocialMedium
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestBase', 'Edumap.Test/Case/Model');
App::uses('EdumapSocialMedium', 'Edumap.Model');

/**
 * EdumapSocialMedium Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapSocialMediumTest extends EdumapModelTestBase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->EdumapSocialMedium = ClassRegistry::init('Edumap.EdumapSocialMedium');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->EdumapSocialMedium);
		parent::tearDown();
	}

}
