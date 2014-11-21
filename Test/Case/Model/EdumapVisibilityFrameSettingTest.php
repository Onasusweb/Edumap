<?php
/**
 * EdumapVisibilityFrameSetting Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */

App::uses('EdumapAppModelTest', 'Edumap.Test/Case/Model');

/**
 * Summary for EdumapVisibilityFrameSetting Test Case
 */
class EdumapVisibilityFrameSettingTest extends EdumapAppModelTest {

	public function testGetEdumapVisibilityFrameSetting() {
		$result = $this->EdumapVisibilityFrameSetting->getEdumapVisibilityFrameSetting();
		$expected = array(
			'EdumapVisibilityFrameSetting' => array(
				'id' => 1,
				'frame_key' => 'Lorem ipsum dolor sit amet',
				'name' => 1,
				'name_kana' => 1,
				'handle' => 1,
				'postal_code' => 1,
				'prefecture' => 1,
				'location' => 1,
				'tel' => 1,
				'fax' => 1,
				'emergency_email' => 1,
				'inquiry' => 1,
				'site_url' => 1,
				'rss_url' => 1,
				'foundation_date' => 1,
				'closed_date' => 1,
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 1,
				'principal_email' => 1,
				'student_number' => 1,
				'social_media' => 1,
				'description' => 1,
			)
		);
		$this->_assertGetEdumapVisibilityFrameSetting($expected, $result);
	}
}
