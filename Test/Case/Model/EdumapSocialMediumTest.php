<?php
/**
 * EdumapSocialMedium Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */
App::uses('EdumapAppModelTest', 'Edumap.Test/Case/Model');
/**
 * Summary for EdumapSocialMedium Test Case
 */
class EdumapSocialMediumTest extends EdumapAppModelTest {


/**
 * testGetEdumapSocialMedium method
 *
 * @return void
 */
	public function testGetEdumapSocialMedium() {
		$edumap_key = 'Lorem ipsum dolor sit amet';
		$result = $this->EdumapSocialMedium->getEdumapSocialMedium($edumap_key);
		
		$expected = array(
			'EdumapSocialMedium' => array(
				'id' => 1,
				'edumap_key' => 'Lorem ipsum dolor sit amet',
				'type' => 'Lorem ipsum dolor sit amet',
				'value' => 'Lorem ipsum dolor sit amet',
			)
		);
		
		$this->_assertGetEdumapSocialMedium($expected, $result);
	}

	public function testGetEdumapSocialMediumNoEdumapKey() {
		$edumap_key = '';
		$result = $this->EdumapSocialMedium->getEdumapSocialMedium($edumap_key);
		
		$expected = array(
			'EdumapSocialMedium' => array(
				'value' => '',
			)
		);
		
		$this->_assertGetEdumapSocialMedium($expected, $result);
	}

}
