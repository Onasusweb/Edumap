<?php
/**
 * EdumapStudent Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('EdumapAppModelTest', 'Edumap.Test/Case/Model');

/**
 * Summary for EdumapStudent Test Case
 */
class EdumapStudentTest extends EdumapAppModelTest {

/**
 * testGetEdumapStudent method
 *
 * @return void
 */
	public function testGetEdumapStudent() {
		$edumap_key = 'Lorem ipsum dolor sit amet';
		$result = $this->EdumapStudent->getEdumapStudent($edumap_key);

		$expected = array(
			'EdumapStudent' => array(
				'0' => array(
					'id' => 1,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 0,
					'grade' => 1,
					'number' => 1,
				),
				'1' => array(
					'id' => 2,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 1,
					'grade' => 1,
					'number' => 1,
				),
				'2' => array(
					'id' => 3,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 0,
					'grade' => 2,
					'number' => 1,
				),
				'3' => array(
					'id' => 4,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 1,
					'grade' => 2,
					'number' => 1,
				),
				'4' => array(
					'id' => 5,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 0,
					'grade' => 3,
					'number' => 1,
				),
				'5' => array(
					'id' => 6,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 1,
					'grade' => 3,
					'number' => 1,
				),
				'6' => array(
					'id' => 7,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 0,
					'grade' => 4,
					'number' => 1,
				),
				'7' => array(
					'id' => 8,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 1,
					'grade' => 4,
					'number' => 1,
				),
				'8' => array(
					'id' => 9,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 0,
					'grade' => 5,
					'number' => 1,
				),
				'9' => array(
					'id' => 10,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 1,
					'grade' => 5,
					'number' => 1,
				),
				'10' => array(
					'id' => 11,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 0,
					'grade' => 6,
					'number' => 1,
				),
				'11' => array(
					'id' => 12,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '2000',
					'gendar' => 1,
					'grade' => 6,
					'number' => 1,
				)
			)
		);
		
		$this->_assertGetEdumapStudent($expected, $result);
	}

	public function testGetEdumapStudentNoEdumapKey() {
		$edumap_key = '';
		$result = $this->EdumapStudent->getEdumapStudent($edumap_key);
		
		$expected = array(
			'EdumapStudent' => array(
				'0' => array(
					'number' => 0,
				),
				'1' => array(
					'number' => 0,
				),
				'2' => array(
					'number' => 0,
				),
				'3' => array(
					'number' => 0,
				),
				'4' => array(
					'number' => 0,
				),
				'5' => array(
					'number' => 0,
				),
				'6' => array(
					'number' => 0,
				),
				'7' => array(
					'number' => 0,
				),
				'8' => array(
					'number' => 0,
				),
				'9' => array(
					'number' => 0,
				),
				'10' => array(
					'number' => 0,
				),
				'11' => array(
					'number' => 0,
				)
			)
		);
		$this->_assertGetEdumapStudent($expected, $result);
	}
}
