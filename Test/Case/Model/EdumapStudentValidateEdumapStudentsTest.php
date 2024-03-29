<?php
/**
 * Test of EdumapStudent->validateEdumapStudents()
 *
 * @property EdumapStudent $EdumapStudent
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestBase', 'Edumap.Test/Case/Model');

/**
 * Test of EdumapStudent->validateEdumapStudents()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapStudentValidateEdumapStudentsTest extends EdumapModelTestBase {

/**
 * Expect EdumapStudent->validateEdumapStudents() to validate and return true on validation success
 *
 * @return void
 */
	public function testValidateEdumapStudentsBySingleData() {
		//$data = array(
		//	'EdumapStudent' =>
		//		array('grade' => '2', 'gendar' => false, 'number' => '123')
		//);
		//$result = $this->EdumapStudent->validateEdumapStudents($data);
		//$this->assertTrue($result, 'Validation single data ' . print_r($data, true));
	}

/**
 * Expect EdumapStudent->validateEdumapStudents() to validate and return true on validation success
 *
 * @return void
 */
	public function testValidateEdumapStudentsByManyData() {
		//$data = array(
		//	array('grade' => '2', 'gendar' => false, 'number' => '123'),
		//	array('grade' => '2', 'gendar' => true, 'number' => '456'),
		//	array('grade' => '3', 'gendar' => false, 'number' => '789'),
		//	array('grade' => '4', 'gendar' => true, 'number' => '654'),
		//);
		//$result = $this->EdumapStudent->validateEdumapStudents($data);
		//$this->assertTrue($result, 'Validation many data ' . print_r($data, true));
	}

/**
 * Expect EdumapStudent->validateEdumapStudents() to validate edumap_students.grade
 *  and return false on validation error
 *
 * @return void
 */
	public function testValidateEdumapStudentsErrorByGrade() {
		//$data = array(
		//	'EdumapStudent' =>
		//		array('gendar' => false, 'number' => '123')
		//);
		//$checks = array(
		//	null, '', 'abcde', false, true, '123abcd'
		//);
		//
		////テスト実施
		//$result = $this->EdumapStudent->validateEdumapStudents($data);
		//$this->assertFalse($result, 'Unknown grade field ' . print_r($data, true));
		//
		//foreach ($checks as $check) {
		//	$data['EdumapStudent']['grade'] = $check;
		//	$result = $this->EdumapStudent->validateEdumapStudents($data);
		//	$this->assertFalse($result, 'Error grade field ' . print_r($data, true));
		//}
	}

/**
 * Expect EdumapStudent->validateEdumapStudents() to validate edumap_students.gendar
 *  and return false on validation error
 *
 * @return void
 */
	public function testValidateEdumapStudentsErrorByGendar() {
		//$data = array(
		//	'EdumapStudent' =>
		//		array('grade' => '1', 'number' => '123')
		//);
		//$checks = array(
		//	null, '', 'abcde', 9, '9'
		//);
		//
		////テスト実施
		//$result = $this->EdumapStudent->validateEdumapStudents($data);
		//$this->assertFalse($result, 'Unknown gendar field ' . print_r($data, true));
		//
		//foreach ($checks as $check) {
		//	$data['EdumapStudent']['gendar'] = $check;
		//	$result = $this->EdumapStudent->validateEdumapStudents($data);
		//	$this->assertFalse($result, 'Error gendar field ' . print_r($data, true));
		//}
	}

/**
 * Expect EdumapStudent->validateEdumapStudents() to validate edumap_students.grade
 *  and return false on validation error
 *
 * @return void
 */
	public function testValidateEdumapStudentsErrorByNumber() {
		//$data = array(
		//	'EdumapStudent' =>
		//		array('grade' => '2', 'gendar' => false),
		//);
		//$checks = array(
		//	null, '', 'abcde', false, true, '123abcd'
		//);
		//
		////テスト実施
		//$result = $this->EdumapStudent->validateEdumapStudents($data);
		//$this->assertFalse($result, 'Unknown number field ' . print_r($data, true));
		//
		//foreach ($checks as $check) {
		//	$data['EdumapStudent']['number'] = $check;
		//	$result = $this->EdumapStudent->validateEdumapStudents($data);
		//	$this->assertFalse($result, 'Error number field ' . print_r($data, true));
		//}
	}

}
