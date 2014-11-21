
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

App::uses('Edumap', 'Edumap.Model');
App::uses('NetCommonsBlockComponent', 'NetCommons.Controller/Component');

/**
 *Edumap Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapAppModelTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.edumap.edumap',
		'plugin.edumap.edumap_visibility_frame_setting',
		'plugin.edumap.edumap_student',
		'plugin.edumap.edumap_social_medium',
		'plugin.edumap.block',
		'plugin.edumap.comment',
		'plugin.frames.box',
		'plugin.frames.language',
		'plugin.rooms.room',
		'plugin.edumap.user_attributes_user',
		'plugin.edumap.user',
		'plugin.edumap.frame',
		'plugin.edumap.plugin',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Edumap = ClassRegistry::init('Edumap.Edumap');
		$this->EdumapStudent = ClassRegistry::init('Edumap.EdumapStudent');
		$this->EdumapSocialMedium = ClassRegistry::init('Edumap.EdumapSocialMedium');
		$this->EdumapVisibilityFrameSetting = ClassRegistry::init('Edumap.EdumapVisibilityFrameSetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Edumap);
		unset($this->EdumapStudent);
		unset($this->EdumapSocialMedium);
		unset($this->EdumapVisibilityFrameSetting);
		parent::tearDown();
	}

/**
 * _assertGetEdumap method
 *
 * @param array $expected correct data
 * @param array $result result data
 * @return void
 */
	protected function _assertGetEdumap($expected, $result) {
		$unsets = array(
			'created_user',
			'created',
			'modified_user',
			'modified'
		);

		//Edumapデータのテスト
		foreach ($unsets as $key) {
			if (array_key_exists($key, $result['Edumap'])) {
				unset($result['Edumap'][$key]);
			}
		}

		$this->assertArrayHasKey('Edumap', $result, 'Error ArrayHasKey Edumap');
		$this->assertEquals($expected['Edumap'], $result['Edumap'], 'Error Equals Edumap');

		//Blockデータのテスト
		if (isset($expected['Block'])) {
			foreach ($unsets as $key) {
				if (array_key_exists($key, $result['Block'])) {
					unset($result['Block'][$key]);
				}
			}

			$this->assertArrayHasKey('Block', $result, 'Error ArrayHasKey Block');
			$this->assertEquals($expected['Block'], $result['Block'], 'Error Equals Block');
		}
	}

/**
 * _assertGetEdumapStudent method
 *
 * @param array $expected correct data
 * @param array $result result data
 * @return void
 */
	protected function _assertGetEdumapStudent($expected, $result) {
		$unsets = array(
			'created_user',
			'created',
			'modified_user',
			'modified'
		);

		//EdumapStudentデータのテスト
		foreach ($unsets as $key) {
			for($i=0 ; $i<12 ; $i++) {
				if (array_key_exists($key, $result['EdumapStudent'][$i])) {
					unset($result['EdumapStudent'][$i][$key]);
				}
			}
		}
		$this->assertArrayHasKey('EdumapStudent', $result, 'Error ArrayHasKey EdumapStudent');
		$this->assertEquals($expected['EdumapStudent'], $result['EdumapStudent'], 'Error Equals EdumapStudent');
	}

/**
 * _assertGetEdumapSocialMedium method
 *
 * @param array $expected correct data
 * @param array $result result data
 * @return void
 */
	protected function _assertGetEdumapSocialMedium($expected, $result) {
		$unsets = array(
			'created_user',
			'created',
			'modified_user',
			'modified'
		);

		//EdumapSocialMediumデータのテスト
		foreach ($unsets as $key) {
			if (array_key_exists($key, $result['EdumapSocialMedium'])) {
				unset($result['EdumapSocialMedium'][$key]);
			}
		}

		$this->assertArrayHasKey('EdumapSocialMedium', $result, 'Error ArrayHasKey EdumapSocialMedium');
		$this->assertEquals($expected['EdumapSocialMedium'], $result['EdumapSocialMedium'], 'Error Equals EdumapSocialMedium');
	}

/**
 * _assertGetEdumapVisibilityFrameSetting method
 *
 * @param array $expected correct data
 * @param array $result result data
 * @return void
 */
	protected function _assertGetEdumapVisibilityFrameSetting($expected, $result) {
		$unsets = array(
			'created_user',
			'created',
			'modified_user',
			'modified'
		);

		//EdumapVisibilityFrameSettingデータのテスト
		foreach ($unsets as $key) {
			if (array_key_exists($key, $result['EdumapVisibilityFrameSetting'])) {
				unset($result['EdumapVisibilityFrameSetting'][$key]);
			}
		}

		$this->assertArrayHasKey('EdumapVisibilityFrameSetting', $result, 'Error ArrayHasKey EdumapVisibilityFrameSetting');
		$this->assertEquals($expected['EdumapVisibilityFrameSetting'], $result['EdumapVisibilityFrameSetting'], 'Error Equals EdumapVisibilityFrameSetting');
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->assertTrue(true);
	}
}
