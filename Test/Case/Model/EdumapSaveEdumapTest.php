<?php
/**
 * Test of Edumap->saveEdumap()
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
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Test of Edumap->saveEdumap()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapSaveEdumapTest extends EdumapModelTestBase {

/**
 * default value
 *
 * @var array
 */
	//private $__saveDefault = array(
	//	'Edumap' => array(
	//		'language_id' => '2',
	//		'file_id' => null,
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
	//	'Block' => array(
	//		'language_id' => '2',
	//		'plugin_key' => 'edumap'
	//	)
	//);

/**
 * Expect Edumap->saveEdumap() saves data
 *
 * @return void
 */
	public function testSaveEdumap() {
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		////コンテンツの公開権限true
		//$this->Edumap->Behaviors->attach('Publishable');
		//$this->Edumap->Behaviors->Publishable->setup($this->Edumap, ['contentPublishable' => true]);
		//
		////アップロードファイル
		//$folder = new Folder();
		//$folder->create(TMP . 'tests' . DS . 'test');
		//$file = new File(
		//	APP . 'Plugin' . DS . 'Files' . DS . 'Test' . DS . 'Fixture' . DS . 'logo.gif'
		//);
		//$file->copy(TMP . 'tests' . DS . 'test' . DS . 'logo.gif');
		//$file->close();
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//			'status' => WorkflowComponent::STATUS_PUBLISHED,
		//			'file_id' => 1,
		//			Edumap::AVATAR_INPUT => array(
		//				'name' => 'logo.gif',
		//				'type' => 'image/gif',
		//				'tmp_name' => TMP . 'tests' . DS . 'test' . DS . 'logo.gif',
		//				'error' => 0,
		//				'size' => 5873,
		//			),
		//		),
		//		Edumap::AVATAR_INPUT => array(
		//			'File' => array(
		//				'status' => 1,
		//				'role_type' => 'room_file_role',
		//				'path' => '{ROOT}test{DS}1{DS}',
		//				'slug' => 'edumap_avatar_1',
		//				'extension' => 'gif',
		//				'original_name' => 'edumap_avatar_1',
		//				'mimetype' => 'image/gif',
		//				'name' => 'logo.gif',
		//				'alt' => 'logo.gif',
		//				'size' => 5873,
		//			),
		//			'FilesPlugin' => array(
		//				'plugin_key' => 'edumap'
		//			),
		//			'FilesRoom' => array(
		//				'room_id' => 1
		//			),
		//			'FilesUser' => array(
		//				'user_id' => 1
		//			),
		//		)
		//	)
		//);
		//
		////登録処理実行
		//$this->Edumap->saveEdumap($data);
		//
		////期待値の生成
		//$edumapId = $this->Edumap->getLastInsertID();
		//$fileId = $this->FileModel->getLastInsertID();
		//
		//$expected = $data;
		//$expected['Edumap'] = Hash::merge(
		//	$data['Edumap'],
		//	array(
		//		'id' => $edumapId,
		//		'file_id' => $fileId,
		//		'foundation_date' => '194512',
		//		'closed_date' => '201504',
		//		'is_active' => 1,
		//		'is_latest' => 1,
		//	)
		//);
		//$expected['EdumapSocialMedium'] = Hash::insert(
		//	array_values($data['EdumapSocialMedium']), '{n}.edumap_id', $edumapId
		//);
		//$expected['EdumapStudent'] = Hash::insert(
		//	$data['EdumapStudent'], '{n}.edumap_id', $edumapId
		//);
		//unset($expected[Edumap::AVATAR_INPUT]);
		//unset($expected['Edumap'][Edumap::AVATAR_INPUT]);
		//
		////テスト実施
		//$this->__assert($expected, $roomId);
		//
		//$folder->delete(TMP . 'tests' . DS . 'test');
	}

/**
 * Expect Edumap->saveEdumap() saves data without null block_id
 *
 * @return void
 */
	public function testWithoutBlockId() {
		//$frameId = '123';
		//$blockId = null;
		//$blockKey = null;
		//$roomId = '2';
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
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'key' => '',
		//			'status' => WorkflowComponent::STATUS_PUBLISHED,
		//		),
		//	)
		//);
		//
		////登録処理実行
		//$edumap = $this->Edumap->saveEdumap($data);
		//
		////期待値の生成
		//$edumapId = $this->Edumap->getLastInsertID();
		//
		//$expected = $data;
		//$expected['Block']['id'] = $this->Block->getLastInsertID();
		//
		//$expected['Edumap'] = Hash::merge(
		//	$data['Edumap'],
		//	array(
		//		'id' => $edumapId,
		//		'key' => $edumap['Edumap']['key'],
		//		'block_id' => $expected['Block']['id'],
		//		'foundation_date' => '194512',
		//		'closed_date' => '201504',
		//		'is_active' => '1',
		//		'is_latest' => '1',
		//	)
		//);
		//$expected['EdumapSocialMedium'] = Hash::insert(
		//	array_values($data['EdumapSocialMedium']), '{n}.edumap_id', $edumapId
		//);
		//$expected['EdumapStudent'] = Hash::insert(
		//	$data['EdumapStudent'], '{n}.edumap_id', $edumapId
		//);
		//
		////テスト実施
		//$this->__assert($expected, $roomId);
	}

/**
 * Expect Edumap->saveEdumap() saves data without content_publishable privilege
 *
 * @return void
 */
	public function testWithoutPublishable() {
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//			'status' => WorkflowComponent::STATUS_APPROVED,
		//		),
		//	)
		//);
		//
		////登録処理実行
		//$this->Edumap->saveEdumap($data);
		//
		////期待値の生成
		//$edumapId = $this->Edumap->getLastInsertID();
		//
		//$expected = $data;
		//$expected['Edumap'] = Hash::merge(
		//	$data['Edumap'],
		//	array(
		//		'id' => $edumapId,
		//		'foundation_date' => '194512',
		//		'closed_date' => '201504',
		//		'is_active' => 0,
		//		'is_latest' => 1,
		//	)
		//);
		//$expected['EdumapSocialMedium'] = Hash::insert(
		//	array_values($data['EdumapSocialMedium']), '{n}.edumap_id', $edumapId
		//);
		//$expected['EdumapStudent'] = Hash::insert(
		//	$data['EdumapStudent'], '{n}.edumap_id', $edumapId
		//);
		//
		////テスト実施
		//$this->__assert($expected, $roomId);
	}

/**
 * Expect Edumap->validateEdumap() to validate files.id
 *   and return false on validation error
 *
 * @return void
 */
	public function testValidationErrorByUnknownFileId() {
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//			'file_id' => 10,
		//			Edumap::AVATAR_INPUT => array(
		//				'name' => 'logo.gif',
		//				'type' => 'image/gif',
		//				'tmp_name' => TESTS . 'logo.gif',
		//				'error' => 0,
		//				'size' => 5873,
		//			),
		//		),
		//		Edumap::AVATAR_INPUT => array(
		//			'File' => array(
		//				'status' => 1,
		//				'role_type' => 'room_file_role',
		//				'path' => '{ROOT}test{DS}1{DS}',
		//				'slug' => 'edumap_avatar_1',
		//				'extension' => 'gif',
		//				'original_name' => 'edumap_avatar_1',
		//				'mimetype' => 'image/gif',
		//				'name' => 'logo.gif',
		//				'alt' => 'logo.gif',
		//				'size' => 5873,
		//			),
		//			'FilesPlugin' => array(
		//				'plugin_key' => 'edumap'
		//			),
		//			'FilesRoom' => array(
		//				'room_id' => 1
		//			),
		//			'FilesUser' => array(
		//				'user_id' => 1
		//			),
		//		)
		//	)
		//);
		//
		////テスト実施
		//$result = $this->Edumap->saveEdumap($data);
		//$this->assertFalse($result, 'Error avatar ' . print_r($data, true));
	}

/**
 * Expect Edumap->validateEdumap() to validate file
 *   and return false on validation error
 *
 * @return void
 */
	public function testValidationErrorByFile() {
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//			'file_id' => 0,
		//			Edumap::AVATAR_INPUT => array(
		//				'name' => 'logo.gif',
		//				'type' => 'image/gif',
		//				'tmp_name' => TESTS . 'logo.gif',
		//				'error' => 0,
		//				'size' => 5873,
		//			),
		//		),
		//		Edumap::AVATAR_INPUT => array(
		//			'File' => array(
		//				'status' => 1,
		//				'role_type' => 'room_file_role',
		//				'path' => '{ROOT}test{DS}1{DS}',
		//				'slug' => 'edumap_avatar_1',
		//				'extension' => 'gif',
		//				'original_name' => 'edumap_avatar_1',
		//				'mimetype' => 'image/gif',
		//				'name' => '',
		//				'alt' => 'logo.gif',
		//				'size' => 5873,
		//			),
		//			'FilesPlugin' => array(
		//				'plugin_key' => 'edumap'
		//			),
		//			'FilesRoom' => array(
		//				'room_id' => 1
		//			),
		//			'FilesUser' => array(
		//				'user_id' => 1
		//			),
		//		)
		//	)
		//);
		//
		////テスト実施
		//$result = $this->Edumap->saveEdumap($data);
		//$this->assertFalse($result, 'Error avatar ' . print_r($data, true));
	}

/**
 * Expect Edumap->validateEdumap() to validate file asspcoated
 *   and return false on validation error
 *
 * @return void
 */
	public function testValidationErrorByFileAssociated() {
		//$frameId = '121';
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		////データ生成
		//$data = Hash::merge(
		//	$this->__saveDefault,
		//	array(
		//		'Frame' => array('id' => $frameId),
		//		'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//		'Edumap' => array(
		//			'block_id' => $blockId,
		//			'key' => 'edumap_1',
		//			'file_id' => 0,
		//			Edumap::AVATAR_INPUT => array(
		//				'name' => 'logo.gif',
		//				'type' => 'image/gif',
		//				'tmp_name' => TESTS . 'logo.gif',
		//				'error' => 0,
		//				'size' => 5873,
		//			),
		//		),
		//		Edumap::AVATAR_INPUT => array(
		//			'File' => array(
		//				'status' => 1,
		//				'role_type' => 'room_file_role',
		//				'path' => '{ROOT}test{DS}1{DS}',
		//				'slug' => 'edumap_avatar_1',
		//				'extension' => 'gif',
		//				'original_name' => 'edumap_avatar_1',
		//				'mimetype' => 'image/gif',
		//				'name' => 'logo.gif',
		//				'alt' => 'logo.gif',
		//				'size' => 5873,
		//			),
		//			'FilesPlugin' => array(
		//				'plugin_key' => ''
		//			),
		//			'FilesRoom' => array(
		//				'room_id' => 1
		//			),
		//			'FilesUser' => array(
		//				'user_id' => 1
		//			),
		//		)
		//	)
		//);
		//
		////テスト実施
		//$result = $this->Edumap->saveEdumap($data);
		//$this->assertFalse($result, 'Error avatar ' . print_r($data, true));
	}

/**
 * Expect Edumap->saveEdumap() to validate frames.id and throw exception on error
 *
 * @return void
 */
	public function testSaveEdumapByUnknownFrameId() {
		//$this->setExpectedException('InternalErrorException');
		//
		//$frameId = 9999;
		//$blockId = '121';
		//$blockKey = 'block_' . $blockId;
		//$roomId = '1';
		//
		////データ生成
		//$data = array(
		//	'Frame' => array('id' => $frameId),
		//	'Block' => array('id' => $blockId, 'key' => $blockKey, 'room_id' => $roomId),
		//	'Edumap' => array(
		//		'block_id' => $blockId,
		//		'key' => 'edumap_1',
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
		//
		////登録処理実行
		//$this->Edumap->saveEdumap($data);
	}

/**
 * __assert
 *
 * @param array $expected Expected value
 * @param int $roomId rooms.id
 * @return void
 */
	//private function __assert($expected, $roomId) {
	//	//edumap
	//	$result = $this->Edumap->getEdumap($expected['Block']['id'], $roomId, true);
	//	$this->_assertArray(null, $expected['Edumap'], $result['Edumap']);
	//
	//	//edumapStudent
	//	$result = $this->EdumapStudent->find('all', array(
	//		'fields' => array('id', 'edumap_id', 'gendar', 'number', 'grade'),
	//		'recursive' => -1,
	//		'conditions' => array(
	//			'edumap_id' => $expected['Edumap']['id']
	//		)
	//	));
	//	$result = Hash::combine($result, '{n}.EdumapStudent.id', '{n}.EdumapStudent');
	//	$result = Hash::remove($result, '{n}.id');
	//
	//	$this->_assertArray(null, $expected['EdumapStudent'], array_values($result));
	//
	//	//edumapSocialMedium
	//	$result = $this->EdumapSocialMedium->find('all', array(
	//		'fields' => array('id', 'edumap_id', 'value', 'type'),
	//		'recursive' => -1,
	//		'conditions' => array(
	//			'edumap_id' => $expected['Edumap']['id']
	//		)
	//	));
	//	$result = Hash::combine($result, '{n}.EdumapSocialMedium.id', '{n}.EdumapSocialMedium');
	//	$result = Hash::remove($result, '{n}.id');
	//	$this->_assertArray(null, $expected['EdumapSocialMedium'], array_values($result));
	//
	//	if ($expected['Edumap']['file_id'] > 0) {
	//		$result = $this->FileModel->find('first', array(
	//			'recursive' => -1,
	//			'conditions' => array(
	//				$this->FileModel->alias . '.id' => $expected['Edumap']['file_id']
	//			)
	//		));
	//		if (file_exists($result['File']['path'])) {
	//			$folder = new Folder();
	//			$folder->delete($result['File']['path']);
	//		}
	//	}
	//}

}
