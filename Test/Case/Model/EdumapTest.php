<?php
/**
 * Edumap Model Test Case
 *
 * @property Edumap $Edumap
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapAppModelTest', 'Edumap.Test/Case/Model');

/**
 *Edumap Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapTest extends EdumapAppModelTest {


/**
 * testGetEdumap method
 *
 * @return void
 */
	public function testGetEdumap() {
		$blockId = 1;
		$contentEditable = true;
		$result = $this->Edumap->getEdumap($blockId, $contentEditable);

		$expected = array(
			'Edumap' => array(
				'id' => 1,
				'block_id' => 1,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '1',
				'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'tel' => 'Lorem ipsum',
				'fax' => 'Lorem ipsum',
				'emergency_email' => 'Lorem ipsum dolor sit amet',
				'inquiry' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'site_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'rss_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'foundation_date' => 'Lorem ',
				'closed_date' => 'Lorem ',
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 'Lorem ipsum dolor sit amet',
				'principal_email' => 'Lorem ipsum dolor sit amet',
				'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'is_auto_translated' => 1,
				'translation_engine' => 'Lorem ipsum dolor sit amet',
			),
			'Block' => array(
				'id' => '1',
				'language_id' => '2',
				'room_id' => '1',
				'key' => 'block_1',
				'name' => '',
			)
		);

		$this->_assertGetEdumap($expected, $result);
	}

/**
 * testGetEdumapByNoEditable method
 *
 * @return void
 */
	public function testGetEdumapByNoEditable() {
		$blockId = 1;
		$contentEditable = false;
		$result = $this->Edumap->getEdumap($blockId, $contentEditable);

		$expected = array(
			'Edumap' => array(
				'id' => 1,
				'block_id' => 1,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '1',
				'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'tel' => 'Lorem ipsum',
				'fax' => 'Lorem ipsum',
				'emergency_email' => 'Lorem ipsum dolor sit amet',
				'inquiry' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'site_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'rss_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'foundation_date' => 'Lorem ',
				'closed_date' => 'Lorem ',
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 'Lorem ipsum dolor sit amet',
				'principal_email' => 'Lorem ipsum dolor sit amet',
				'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'is_auto_translated' => 1,
				'translation_engine' => 'Lorem ipsum dolor sit amet',
			),
			'Block' => array(
				'id' => '1',
				'language_id' => '2',
				'room_id' => '1',
				'key' => 'block_1',
				'name' => '',
			)
		);

		$this->_assertGetEdumap($expected, $result);
	}

/**
 * testGetEdumapByNoBlockId method
 *
 * @return void
 */
	public function testGetEdumapByNoBlockId() {
		$blockId = 0;
		$contentEditable = true;
		$result = $this->Edumap->getEdumap($blockId, $contentEditable);

		$expected = array(
			'Edumap' => array(
				'block_id' => '0',
				'key' => '',
				'status' => '0',
				'content' => '',
				'is_auto_translated' => '0',
				'key' => '',
				'id' => '0'
			),
		);

		$this->_assertGetEdumap($expected, $result);
	}

/**
 * testSaveEdumap method
 *
 * @return void
 */
	public function testSaveEdumap() {
		$postData = array(
			'Edumap' => array(
				'id' => 1,
				'block_id' => 1,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '1',
				'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'tel' => 'Lorem ipsum',
				'fax' => 'Lorem ipsum',
				'emergency_email' => 'Lorem ipsum dolor sit amet',
				'inquiry' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'site_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'rss_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'foundation_date' => 'Lorem ',
				'closed_date' => 'Lorem ',
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 'Lorem ipsum dolor sit amet',
				'principal_email' => 'Lorem ipsum dolor sit amet',
				'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'is_auto_translated' => 1,
				'translation_engine' => 'Lorem ipsum dolor sit amet',
			),
			'EdumapStudent' => array(
				'0' => array(
					'id' => 1,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '1000',
					'gendar' => 1,
					'grade' => 1,
					'number' => 1,
				)
			),
			'EdumapSocialMedium' => array(
				'id' => 1,
				'edumap_key' => 'Lorem ipsum dolor sit amet',
				'type' => 'twitter',
				'value' => 'Lorem ipsum dolor sit amet',
			),
			'Frame' => array(
				'id' => '1'
			)
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertNotEquals($result, false, 'Error saveEdumap');
	}

/**
 * testSaveEdumapByNoBlockId method
 *
 * @return void
 */
	public function testSaveEdumapByNoBlockId() {
		$postData = array(
			'Edumap' => array(
				'id' => 1,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '1',
				'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'tel' => 'Lorem ipsum',
				'fax' => 'Lorem ipsum',
				'emergency_email' => 'Lorem ipsum dolor sit amet',
				'inquiry' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'site_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'rss_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'foundation_date' => 'Lorem ',
				'closed_date' => 'Lorem ',
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 'Lorem ipsum dolor sit amet',
				'principal_email' => 'Lorem ipsum dolor sit amet',
				'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'is_auto_translated' => 1,
				'translation_engine' => 'Lorem ipsum dolor sit amet',
			),
			'EdumapStudent' => array(
				'0' => array(
					'id' => 1,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '1000',
					'gendar' => 1,
					'grade' => 1,
					'number' => 1,
				)
			),
			'EdumapSocialMedium' => array(
				'id' => 1,
				'edumap_key' => 'Lorem ipsum dolor sit amet',
				'type' => 'twitter',
				'value' => 'Lorem ipsum dolor sit amet',
			),
			'Frame' => array(
				'id' => '3'
			),
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertNotEquals($result, false, 'Error saveEdumap');
	}

/**
 * testSaveEdumapByStatusDisapproved method
 *
 * @return void
 */
	public function testSaveEdumapByStatusDisapproved() {
		$postData = array(
			'Edumap' => array(
				'id' => 1,
				'block_id' => 1,
				'status' => 4,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '1',
				'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'tel' => 'Lorem ipsum',
				'fax' => 'Lorem ipsum',
				'emergency_email' => 'Lorem ipsum dolor sit amet',
				'inquiry' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'site_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'rss_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'foundation_date' => 'Lorem ',
				'closed_date' => 'Lorem ',
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 'Lorem ipsum dolor sit amet',
				'principal_email' => 'Lorem ipsum dolor sit amet',
				'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'is_auto_translated' => 1,
				'translation_engine' => 'Lorem ipsum dolor sit amet',
			),
			'EdumapStudent' => array(
				'0' => array(
					'id' => 1,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '1000',
					'gendar' => 1,
					'grade' => 1,
					'number' => 1,
				)
			),
			'EdumapSocialMedium' => array(
				'id' => 1,
				'edumap_key' => 'Lorem ipsum dolor sit amet',
				'type' => 'twitter',
				'value' => 'Lorem ipsum dolor sit amet',
			),
			'Frame' => array(
				'id' => '3'
			),
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertNotEquals($result, false, 'Error saveEdumap');
	}

/**
 * testSaveEdumap method
 *
 * @return void
 */
	public function testSaveEdumapStatusModify() {
		$postData = array(
			'Edumap' => array(
				'id' => 1,
				'block_id' => 1,
				'status' => 4,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '1',
				'location' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'tel' => 'Lorem ipsum',
				'fax' => 'Lorem ipsum',
				'emergency_email' => 'Lorem ipsum dolor sit amet',
				'inquiry' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'site_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'rss_url' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'foundation_date' => 'Lorem ',
				'closed_date' => 'Lorem ',
				'governor_type' => 1,
				'education_type' => 1,
				'coeducation_type' => 1,
				'principal_name' => 'Lorem ipsum dolor sit amet',
				'principal_email' => 'Lorem ipsum dolor sit amet',
				'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
				'is_auto_translated' => 1,
				'translation_engine' => 'Lorem ipsum dolor sit amet',
			),
			'EdumapStudent' => array(
				'0' => array(
					'id' => 1,
					'edumap_key' => 'Lorem ipsum dolor sit amet',
					'year' => '1000',
					'gendar' => 1,
					'grade' => 1,
					'number' => 1,
				)
			),
			'EdumapSocialMedium' => array(
				'id' => 1,
				'edumap_key' => 'Lorem ipsum dolor sit amet',
				'type' => 'twitter',
				'value' => 'Lorem ipsum dolor sit amet',
			),
			'Frame' => array(
				'id' => '3'
			),
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertNotEquals($result, false, 'Error saveEdumap');
	}

}
