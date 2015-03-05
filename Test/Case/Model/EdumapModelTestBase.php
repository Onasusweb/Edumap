<?php
/**
 * Edumap Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Edumap Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapModelTestBase extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.edumap.block',
		'plugin.edumap.comment',
		'plugin.edumap.edumap',
		'plugin.edumap.edumap_social_medium',
		'plugin.edumap.edumap_student',
		'plugin.edumap.edumap_visibility_setting',
		'plugin.edumap.frame',
		'plugin.edumap.plugin',
		'plugin.edumap.user',
		'plugin.edumap.user_attributes_user',
		'plugin.frames.box',
		'plugin.m17n.language',
		'plugin.rooms.room',
	);

/**
 * setUp method
 *
 * @return void
 */
	//public function setUp() {
	//	parent::setUp();
	//	$this->Edumap = ClassRegistry::init('Edumap.Edumap');
	//	$this->EdumapStudent = ClassRegistry::init('Edumap.EdumapStudent');
	//	$this->EdumapSocialMedium = ClassRegistry::init('Edumap.EdumapSocialMedium');
	//	$this->EdumapVisibilitySetting = ClassRegistry::init('Edumap.EdumapVisibilitySetting');
	//}

/**
 * tearDown method
 *
 * @return void
 */
	//public function tearDown() {
	//	unset($this->Edumap);
	//	unset($this->EdumapStudent);
	//	unset($this->EdumapSocialMedium);
	//	unset($this->EdumapVisibilitySetting);
	//	parent::tearDown();
	//}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->assertTrue(true);
	}
}
