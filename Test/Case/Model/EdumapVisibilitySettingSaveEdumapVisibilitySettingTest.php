<?php
/**
 * Test of EdumapVisibilitySetting->saveEdumapVisibilitySetting()
 *
 * @property EdumapVisibilitySetting $EdumapVisibilitySetting
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestBase', 'Edumap.Test/Case/Model');

/**
 * Test of EdumapVisibilitySetting->saveEdumapVisibilitySetting()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapVisibilitySettingSaveEdumapVisibilitySettingTest extends EdumapModelTestBase {

/**
 * default value
 *
 * @var array
 */
	//private $__saveDefault = array(
	//	'EdumapVisibilitySetting' => array(
	//		'file' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'name_kana' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'handle' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'postal_code' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'prefecture' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'location' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'tel' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'fax' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'emergency_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'inquiry' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'site_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'rss_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'foundation_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'closed_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'governor_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'education_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'coeducation_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'principal_name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'principal_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'student_number' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'social_media' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//		'description' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
	//	)
	//);

/**
 * testSaveEdumapVisibilitySetting
 *
 * @return void
 */
	public function testSaveEdumapVisibilitySetting() {
		//$frameId = '121';
		//$blockId = '121';
		//$edumapKey = 'edumap_1';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => 1,
		//			'edumap_key' => $edumapKey,
		//		)
		//	)
		//);
		//
		////登録処理実行
		//$this->EdumapVisibilitySetting->saveEdumapVisibilitySetting($data);
		//
		////期待値の生成
		//$expected = $data;
		//
		////テスト実施
		//$result = $this->EdumapVisibilitySetting->find('first', array(
		//	'recursive' => -1,
		//	'conditions' => array(
		//		'edumap_key' => $edumapKey
		//	)
		//));
		//
		////チェック
		//$this->_assertArray(
		//	null,
		//	$expected['EdumapVisibilitySetting'],
		//	$result['EdumapVisibilitySetting']
		//);
	}

/**
 * Expect EdumapVisibilitySetting->saveEdumapVisibilitySetting()
 *  to validate edumap_visibility_setting.edumap_key and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapVisibilitySettingValidateError() {
		//$frameId = '121';
		//$blockId = '121';
		//$edumapKey = '';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'EdumapVisibilitySetting' => array(
		//			'id' => 1,
		//			'edumap_key' => $edumapKey,
		//		)
		//	)
		//);
		//
		////登録処理実行
		//$result = $this->EdumapVisibilitySetting->saveEdumapVisibilitySetting($data);
		//
		////チェック
		//$this->assertFalse($result, 'testSaveEdumapVisibilitySettingValidateError = ' . print_r($data, true));
	}

}
