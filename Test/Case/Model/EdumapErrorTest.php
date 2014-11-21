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
class EdumapErrorTest extends EdumapAppModelTest {
/**
 * testSaveEdumapByErrorFrameId method
 *
 * @return void
 */
	public function testSaveEdumapByErrorFrameId() {
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
				'prefecture_code' => '',
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
				'id' => '10'
			)
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertFalse($result,'SaveEdumap');
	}

/**
 * testSaveEdumapByBlockSaveError method
 *
 * @return void
 */
	public function testSaveEdumapByBlockSaveError() {
		$this->Block = $this->getMockForModel('Blocks.Block', array('save'));
		$this->Block->expects($this->any())
			->method('save')
			->will($this->returnValue(false));

		$postData = array(
			'Edumap' => array(
				'id' => 1,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '',
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
			)
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertFalse($result);
	}

/**
 * testSaveEdumapByFrameSaveError method
 *
 * @return void
 */
	public function testSaveEdumapByFrameSaveError() {
		$this->Frame = $this->getMockForModel('Frames.Frame', array('save'));
		$this->Frame->expects($this->any())
			->method('save')
			->will($this->returnValue(false));

		$postData = array(
			'Edumap' => array(
				'id' => 1,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
				'name' => 'Lorem ipsum dolor sit amet',
				'name_kana' => 'Lorem ipsum dolor sit amet',
				'handle' => 'Lorem ipsum dolor sit amet',
				'postal_code' => 'Lorem',
				'prefecture_code' => '',
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
			)
		);
		$result = $this->Edumap->saveEdumap($postData);
		$this->assertFalse($result,'SaveEdumap');
		
		unset($this->Frame);

	}

}