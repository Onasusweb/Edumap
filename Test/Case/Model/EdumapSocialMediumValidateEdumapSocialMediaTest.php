<?php
/**
 * Test of EdumapSocialMedium->validateEdumapSocialMedia()
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

/**
 * Test of EdumapSocialMedium->validateEdumapSocialMedia()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapSocialMediumValidateEdumapSocialMediaTest extends EdumapModelTestBase {

/**
 * Expect EdumapSocialMedia->validateEdumapSocialMedia() to validate
 *  and return true on validation success
 *
 * @return void
 */
	public function testValidateEdumapSocialMedia() {
		//$data = array(
		//	array('type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER, 'value' => 'abcde')
		//);
		//$result = $this->EdumapSocialMedium->validateEdumapSocialMedia($data);
		//$this->assertTrue($result);
	}

/**
 * Expect EdumapSocialMedia->validateEdumapSocialMedia() to validate
 *  and return true on validation success
 *
 * @return void
 */
	public function testValidateEdumapSocialMediaByKey() {
		//$data = array(
		//	'EdumapSocialMedium' =>
		//		array('type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER, 'value' => 'abcde')
		//);
		//$result = $this->EdumapSocialMedium->validateEdumapSocialMedia($data);
		//$this->assertTrue($result);
	}

/**
 * Expect EdumapStudent->validateEdumapStudents() to validate edumap_students.grade
 *  and return false on validation error
 *
 * @return void
 */
	public function testValidateEdumapSocialMediaErrorByType() {
		//$data = array(
		//	'EdumapSocialMedium' =>
		//		array('value' => 'abcde')
		//);
		//$checks = array(
		//	null, '', 'abcde', false, true
		//);
		//
		////テスト実施
		//$this->setUp();
		//$result = $this->EdumapSocialMedium->validateEdumapSocialMedia($data);
		//$this->assertFalse($result, 'Unknown type field ' . print_r($data, true));
		//$this->tearDown();
		//
		//foreach ($checks as $check) {
		//	$data['EdumapSocialMedium']['type'] = $check;
		//	$this->setUp();
		//	$result = $this->EdumapSocialMedium->validateEdumapSocialMedia($data);
		//	$this->tearDown();
		//
		//	$this->assertFalse($result, 'Error type field ' . print_r($data, true));
		//}
	}

}
