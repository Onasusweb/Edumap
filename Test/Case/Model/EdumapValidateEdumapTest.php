<?php
/**
 * Test of Edumap->validateEdumap()
 *
 * @property Edumap $Edumap
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestBase', 'Edumap.Test/Case/Model');

/**
 * Test of Edumap->validateEdumap()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class EdumapValidateEdumapTest extends EdumapModelTestBase {

/**
 * default value
 *
 * @var array
 */
	//private $__saveDefault = array(
	//	'Edumap' => array(
	//		'status' => WorkflowComponent::STATUS_APPROVED,
	//		'file_id' => 0,
	//		'name' => 'Edit name',
	//		'name_kana' => 'Edit name_kana',
	//		'handle' => 'Edit handle',
	//		'postal_code' => '123-4567',
	//		'prefecture_code' => '01',
	//		'location' => 'Edit location',
	//		'tel' => '01-2345-6789',
	//		'fax' => '09-8765-4321',
	//		'emergency_email' => 'emergency@example.com',
	//		'inquiry' => 'Edit inquiry',
	//		'site_url' => 'http://site.example.com',
	//		'rss_url' => 'http://rss.example.com',
	//		'foundation_date' => '1945/12',
	//		'closed_date' => '2015/04',
	//		'governor_type' => '3',
	//		'education_type' => '4',
	//		'coeducation_type' => '2',
	//		'principal_name' => 'Edit principal_name',
	//		'principal_email' => 'principal@example.com',
	//		'description' => 'Edit description',
	//		'is_auto_translated' => true,
	//		'translation_engine' => 'Edit translation_engine',
	//	),
	//	'EdumapSocialMedium' => array(
	//		EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
	//			'value' => 'EditTwitterValue',
	//			'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
	//		)
	//	),
	//	'EdumapStudent' => array(
	//		array('grade' => '2', 'gendar' => false, 'number' => '123'),
	//		array('grade' => '2', 'gendar' => true, 'number' => '456'),
	//		array('grade' => '3', 'gendar' => false, 'number' => '789'),
	//		array('grade' => '4', 'gendar' => true, 'number' => '654'),
	//	),
	//	'Comment' => array('comment' => 'Edit comment'),
	//);

/**
 * Expect `status` validate error
 *
 * @return void
 */
	public function testStatus() {
		//$frameId = '121';
		//$blockId = '121';
		//
		////コンテンツの公開権限true
		//$this->Edumap->Behaviors->attach('Publishable');
		//$this->Edumap->Behaviors->Publishable->setup($this->Edumap, ['contentPublishable' => true]);
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	'status' => array(
		//		__d('net_commons', 'Invalid request.')
		//	)
		//);
		//
		////テスト実施
		//unset($data['Edumap']['status']);
		//$this->__assert('status', $data, $expected);
		//
		//foreach ($this->testCaseStatus as $check) {
		//	$data['Edumap']['status'] = $check;
		//	$this->__assert('status', $data, $expected);
		//}
	}

/**
 * Expect `name` validate error by notBlank
 *
 * @return void
 */
	public function testNameByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'name';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'School name'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `handle` validate error by notBlank
 *
 * @return void
 */
	public function testHandleByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'handle';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Handle name'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `postal_code` validate error by notBlank
 *
 * @return void
 */
	public function testPostalCodeByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'postal_code';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Postal code'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `prefecture_code` validate error by notBlank
 *
 * @return void
 */
	public function testPrefectureCodeByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'prefecture_code';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Prefecture'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `location` validate error by notBlank
 *
 * @return void
 */
	public function testLocationByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'location';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Location'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `tel` validate error by notBlank
 *
 * @return void
 */
	public function testTelByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'tel';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Phone number'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `emergency_email` validate error by notBlank
 *
 * @return void
 */
	public function testEmergencyEmailByNotEmpty() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'emergency_email';
		//$message = sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Emergency contact email'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseNotEmpty as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `postal_code` validate error by postal
 *
 * @return void
 */
	public function testPostalCodeByPostal() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'postal_code';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Postal code'), '999-9999');
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCasePostal as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `prefecture_code` validate error by prefectureCode
 *
 * @return void
 */
	public function testPrefectureCodeByCode() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'prefecture_code';
		//$message = __d('net_commons', 'Invalid request.');
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCasePrefecture as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `tel` validate error by phone
 *
 * @return void
 */
	public function testTelByPhone() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'tel';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Phone number'), __d('edumap', 'Phone number'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCasePhone as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `fax` validate error by phone
 *
 * @return void
 */
	public function testFaxByPhone() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'fax';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Fax number'), __d('edumap', 'Fax number'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCasePhone as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `emergency_email` validate error by email
 *
 * @return void
 */
	public function testEmergencyEmailByEmail() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'emergency_email';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Emergency contact email'), __d('edumap', 'E-mail'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseEmail as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `principal_email` validate error by email
 *
 * @return void
 */
	public function testPrincipalEmailByEmail() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'principal_email';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Principal email'), __d('edumap', 'E-mail'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseEmail as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `site_url` validate error by url
 *
 * @return void
 */
	public function testSiteUrlByUrl() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'site_url';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Site URL'), __d('edumap', 'URL'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseUrl as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `rss_url` validate error by url
 *
 * @return void
 */
	public function testRssUrlByUrl() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'rss_url';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'RSS URL'), __d('edumap', 'URL'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseUrl as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `foundation_date` validate error by data
 *
 * @return void
 */
	public function testFoundationDateByDate() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'foundation_date';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Foundation date'), __d('edumap', 'Date'));
		//
		//$field = 'closed_date';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Closed date'), __d('edumap', 'Date'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseDate as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect `closed_date` validate error by data
 *
 * @return void
 */
	public function testClosedDateByDate() {
		//$frameId = '121';
		//$blockId = '121';
		//
		//$field = 'closed_date';
		//$message = sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Closed date'), __d('edumap', 'Date'));
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//	)
		//);
		//
		////期待値
		//$expected = array(
		//	$field => array($message)
		//);
		//
		////テスト実施
		//foreach ($this->testCaseDate as $check) {
		//	$data['Edumap'][$field] = $check;
		//	$this->__assert($field, $data, $expected);
		//}
	}

/**
 * Expect Edumap->validateEdumap() to validate students
 *   and return false on validation error
 *
 * @return void
 */
	public function testStudent() {
		//$frameId = '121';
		//$blockId = '121';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//		'EdumapStudent' => array(
		//			array('grade' => '2', 'gendar' => false, 'number' => '')
		//		),
		//	)
		//);
		////テスト実施
		//$result = $this->Edumap->saveEdumap($data);
		//$this->assertFalse($result, 'Error students ' . print_r($data, true));
	}

/**
 * Expect Edumap->validateEdumap() to validate students
 *   and return false on validation error
 *
 * @return void
 */
	public function testSocialMedia() {
		//$frameId = '121';
		//$blockId = '121';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//		),
		//		'EdumapSocialMedium' => array(
		//			EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
		//				'value' => '',
		//				'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
		//			)
		//		),
		//	)
		//);
		//
		////テスト実施
		//$result = $this->Edumap->saveEdumap($data);
		//$this->assertFalse($result, 'Error students ' . print_r($data, true));
	}

/**
 * Expect Edumap->validateEdumap() to validate comment
 *   and return false on validation error
 *
 * @return void
 */
	public function testComment() {
		//$frameId = '121';
		//$blockId = '121';
		//
		////コンテンツの公開権限true
		//$this->Edumap->Behaviors->attach('Publishable');
		//$this->Edumap->Behaviors->Publishable->setup($this->Edumap, ['contentPublishable' => true]);
		//$this->Edumap->Comment = ClassRegistry::init('Comments.Comment');
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//			'status' => WorkflowComponent::STATUS_DISAPPROVED,
		//		),
		//		'Comment' => array('comment' => ''),
		//	)
		//);
		////テスト実施
		//$result = $this->Edumap->validateEdumap($data, ['comment']);
		//
		//$this->assertFalse($result, 'Error comment ' . print_r($data, true));
	}

/**
 * __assert
 *
 * @param string $field Field name
 * @param array $data Save data
 * @param array $expected Expected value
 * @return void
 */
	//private function __assert($field, $data, $expected) {
	//	//初期処理
	//	$this->setUp();
	//	//処理実行
	//	$result = $this->Edumap->validateEdumap($data);
	//	//戻り値テスト
	//	$this->assertFalse($result, 'Result error: ' . $field . ' ' . print_r($data, true));
	//	//validationErrorsテスト
	//	$this->assertEquals($this->Edumap->validationErrors, $expected,
	//						'Validation error: ' . $field . ' ' . print_r($this->Edumap->validationErrors, true) . print_r($data, true));
	//	//終了処理
	//	$this->tearDown();
	//}

}
