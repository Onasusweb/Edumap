<?php
/**
 * AnnouncementEditController Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('VisibilitySettingsController', 'Edumap.Controller');
App::uses('EdumapControllerTestCase', 'Edumap.Test/Case/Controller');

/**
 * EdumapController Validation Error Test Case based on models
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class VisibilitySettingsControllerValidateErrorTest extends EdumapControllerTestCase {

/**
 * default value
 *
 * @var array
 */
	private $__saveDefault = array(
		'EdumapVisibilitySetting' => array(
			'file' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'name_kana' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'handle' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'postal_code' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'prefecture' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'location' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'tel' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'fax' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'emergency_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'inquiry' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'site_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'rss_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'foundation_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'closed_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'governor_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'education_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'coeducation_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'principal_name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'principal_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'student_number' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'social_media' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'description' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
		)
	);

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testSaveEditErrorByEdumapKey() {
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 1;
		$blockId = 1;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'EdumapVisibilitySetting' => array(
					'id' => '1',
					'edumap_key' => '',
				),
			)
		);

		//テスト実行
		$ret = $this->testAction(
			'/edumap/visibilitySettings/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'data' => $data,
				'type' => 'json',
				'return' => 'contents'
			)
		);
		$result = json_decode($ret, true);

		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));
		$this->assertArrayHasKey('name', $result, print_r($result, true));
		$this->assertArrayHasKey('error', $result, print_r($result, true));
		$this->assertArrayHasKey('validationErrors', $result['error'], print_r($result, true));
		$this->assertArrayHasKey('edumapKey', $result['error']['validationErrors'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testSaveEditErrorByUnknownEdumap() {
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 3;
		$blockId = 10;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'EdumapVisibilitySetting' => array(
					'id' => '',
					'edumap_key' => '',
				),
			)
		);

		//テスト実行
		$this->setExpectedException('BadRequestException');
		$this->testAction(
			'/edumap/visibilitySettings/edit/' . $frameId,
			array(
				'method' => 'post',
				'data' => $data,
				'return' => 'contents'
			)
		);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot edit w/o valid announcements.content
 *
 * @return void
 */
	public function testSaveEditErrorJsonByUnknownEdumap() {
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 3;
		$blockId = 10;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'EdumapVisibilitySetting' => array(
					'id' => '',
					'edumap_key' => '',
				),
			)
		);

		//テスト実行
		$ret = $this->testAction(
			'/edumap/visibilitySettings/edit/' . $frameId . '.json',
			array(
				'method' => 'post',
				'data' => $data,
				'type' => 'json',
				'return' => 'contents'
			)
		);
		$result = json_decode($ret, true);

		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(400, $result['code'], print_r($result, true));
		$this->assertArrayHasKey('name', $result, print_r($result, true));
		$this->assertArrayHasKey('error', $result, print_r($result, true));
		$this->assertArrayHasKey('validationErrors', $result['error'], print_r($result, true));

		AuthGeneralControllerTest::logout($this);
	}

}
