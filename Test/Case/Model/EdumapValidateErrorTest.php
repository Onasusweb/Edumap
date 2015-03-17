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

App::uses('EdumapModelTestCase', 'Edumap.Test/Case/Model');

/**
 * Edumap Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class EdumapValidateErrorTest extends EdumapModelTestCase {

/**
 * default value
 *
 * @var array
 */
	private $__saveDefault = array(
		'Edumap' => array(
			'status' => NetCommonsBlockComponent::STATUS_APPROVED,
			'file_id' => 0,
			'name' => 'Edit name',
			'name_kana' => 'Edit name_kana',
			'handle' => 'Edit handle',
			'postal_code' => '123-4567',
			'prefecture_code' => '01',
			'location' => 'Edit location',
			'tel' => '01-2345-6789',
			'fax' => '09-8765-4321',
			'emergency_email' => 'emergency@example.com',
			'inquiry' => 'Edit inquiry',
			'site_url' => 'http://site.example.com',
			'rss_url' => 'http://rss.example.com',
			'foundation_date' => '1945/12',
			'closed_date' => '2015/04',
			'governor_type' => '3',
			'education_type' => '4',
			'coeducation_type' => '2',
			'principal_name' => 'Edit principal_name',
			'principal_email' => 'principal@example.com',
			'description' => 'Edit description',
			'is_auto_translated' => true,
			'translation_engine' => 'Edit translation_engine',
		),
		'EdumapSocialMedium' => array(
			EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
				'value' => 'EditTwitterValue',
				'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
			)
		),
		'EdumapStudent' => array(
			array('grade' => '2', 'gendar' => false, 'number' => '123'),
			array('grade' => '2', 'gendar' => true, 'number' => '456'),
			array('grade' => '3', 'gendar' => false, 'number' => '789'),
			array('grade' => '4', 'gendar' => true, 'number' => '654'),
		),
		'Comment' => array('comment' => 'Edit comment'),
	);

/**
 * Expect Edumap->saveEdumap() to validate edumap.status
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByStatus() {
		$frameId = 1;
		$blockId = 1;

		//コンテンツの公開権限true
		$this->Edumap->Behaviors->attach('Publishable');
		$this->Edumap->Behaviors->Publishable->setup($this->Edumap, ['contentPublishable' => true]);

		$checks = array(
			null, '', -1, 0, 5, 9999, 'abcde', false,
		);

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
				),
			)
		);

		//テスト実施
		unset($data['Edumap']['status']);
		$this->setUp();
		$result = $this->Edumap->saveEdumap($data);
		$this->tearDown();
		$this->assertFalse($result, 'Unknown status field ' . print_r($data, true));

		foreach ($checks as $check) {
			$data['Edumap']['status'] = $check;
			$this->setUp();
			$result = $this->Edumap->saveEdumap($data);
			$this->tearDown();
			$this->assertFalse($result, 'Error status field ' . print_r($data, true));
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate not empty fields
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByNotEmpty() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'name', 'handle', 'postal_code', 'prefecture_code', 'location', 'tel', 'emergency_email'
		);
		$checks = array(
			null, '', false,
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			unset($data['Edumap'][$field]);
			$this->setUp();
			$result = $this->Edumap->saveEdumap($data);
			$this->tearDown();
			$this->assertFalse($result, 'Unknown ' . $field . ' field ' . print_r($data, true));

			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate postal field
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByPostal() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'postal_code'
		);
		$checks = array(
			'9999-999', 'abc-defg', 'abcdefg', '9999999', '        '
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate postal field
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByPrefectureCode() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'prefecture_code'
		);
		$checks = array(
			'00', '48', '9999', 'ab', 'abcd', '--', '  '
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate postal field
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByPhone() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'tel', 'fax'
		);
		$checks = array(
			'0123456789', 'abcdefghij', '          ',
			'99-9999-9999', 'ab-cdef-ghij',
			'99(9999)9999', 'ab(cdef)ghij', '01(2345)6789', '  (    )    ',
			'+08-01-2345-6789',
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate email field
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByEmail() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'emergency_email', 'principal_email'
		);
		$checks = array(
			'abcdefghij', '9999999',
			'@example.com', 'test@',
			'  @example.com', 'test@    ', 'test@    .com',
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate url field
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByUrl() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'site_url', 'rss_url'
		);
		$checks = array(
			'http:', 'https:', 'ftp:', 'javascript:',
			'http:/', 'https:/', 'ftp:/', 'javascript:/',
			'http://', 'https://', 'ftp://', 'javascript://',
			'http://test', 'https://test', 'ftp://test', 'javascript:test', 'abc://exapmle.com',
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate url field
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByDate() {
		$frameId = 1;
		$blockId = 1;

		$fields = array(
			'foundation_date', 'closed_date'
		);
		$checks = array(
			'201405', 'abcdef', '20140512', '2014/05/12', '0000/00', '9999/99',
		);

		foreach ($fields as $field) {
			//データ生成
			$data = Hash::merge(
				$this->__saveDefault,
				array(
					'Frame' => array('id' => $frameId),
					'Block' => array('id' => $blockId),
					'Edumap' => array(
						'block_id' => $blockId,
						'key' => 'edumap_1',
					),
				)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->setUp();
				$result = $this->Edumap->saveEdumap($data);
				$this->tearDown();
				$this->assertFalse($result, 'Error ' . $field . ' field ' . print_r($data, true));
			}
		}
	}

/**
 * Expect Edumap->saveEdumap() to validate students
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByStudent() {
		$frameId = 1;
		$blockId = 1;

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
				),
				'EdumapStudent' => array(
					array('grade' => '2', 'gendar' => false, 'number' => '')
				),
			)
		);
		//テスト実施
		$result = $this->Edumap->saveEdumap($data);
		$this->assertFalse($result, 'Error students ' . print_r($data, true));
	}

/**
 * Expect Edumap->saveEdumap() to validate students
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapBySocialMedia() {
		$frameId = 1;
		$blockId = 1;

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
				),
				'EdumapSocialMedium' => array(
					EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
						'value' => '',
						'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
					)
				),
			)
		);

		//テスト実施
		$result = $this->Edumap->saveEdumap($data);
		$this->assertFalse($result, 'Error students ' . print_r($data, true));
	}

/**
 * Expect Edumap->saveEdumap() to validate comment
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByComment() {
		$frameId = 1;
		$blockId = 1;

		//コンテンツの公開権限true
		$this->Edumap->Behaviors->attach('Publishable');
		$this->Edumap->Behaviors->Publishable->setup($this->Edumap, ['contentPublishable' => true]);

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
					'status' => NetCommonsBlockComponent::STATUS_DISAPPROVED,
				),
				'Comment' => array('comment' => ''),
			)
		);
		//テスト実施
		$result = $this->Edumap->saveEdumap($data);
		$this->assertFalse($result, 'Error comment ' . print_r($data, true));
	}

/**
 * Expect Edumap->saveEdumap() to validate files.id
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByUnknownFileId() {
		$frameId = 1;
		$blockId = 1;

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
					'file_id' => 10,
					Edumap::AVATAR_INPUT => array(
						'name' => 'logo.gif',
						'type' => 'image/gif',
						'tmp_name' => TESTS . 'logo.gif',
						'error' => 0,
						'size' => 5873,
					),
				),
				Edumap::AVATAR_INPUT => array(
					'File' => array(
						'status' => 1,
						'role_type' => 'room_file_role',
						'path' => '{ROOT}test{DS}1{DS}',
						'slug' => 'edumap_avatar_1',
						'extension' => 'gif',
						'original_name' => 'edumap_avatar_1',
						'mimetype' => 'image/gif',
						'name' => 'logo.gif',
						'alt' => 'logo.gif',
						'size' => 5873,
					),
					'FilesPlugin' => array(
						'plugin_key' => 'edumap'
					),
					'FilesRoom' => array(
						'room_id' => 1
					),
					'FilesUser' => array(
						'user_id' => 1
					),
				)
			)
		);

		//テスト実施
		$result = $this->Edumap->saveEdumap($data);
		$this->assertFalse($result, 'Error avatar ' . print_r($data, true));
	}

/**
 * Expect Edumap->saveEdumap() to validate file
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByFile() {
		$frameId = 1;
		$blockId = 1;

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
					'file_id' => 0,
					Edumap::AVATAR_INPUT => array(
						'name' => 'logo.gif',
						'type' => 'image/gif',
						'tmp_name' => TESTS . 'logo.gif',
						'error' => 0,
						'size' => 5873,
					),
				),
				Edumap::AVATAR_INPUT => array(
					'File' => array(
						'status' => 1,
						'role_type' => 'room_file_role',
						'path' => '{ROOT}test{DS}1{DS}',
						'slug' => 'edumap_avatar_1',
						'extension' => 'gif',
						'original_name' => 'edumap_avatar_1',
						'mimetype' => 'image/gif',
						'name' => '',
						'alt' => 'logo.gif',
						'size' => 5873,
					),
					'FilesPlugin' => array(
						'plugin_key' => 'edumap'
					),
					'FilesRoom' => array(
						'room_id' => 1
					),
					'FilesUser' => array(
						'user_id' => 1
					),
				)
			)
		);

		//テスト実施
		$result = $this->Edumap->saveEdumap($data);
		$this->assertFalse($result, 'Error avatar ' . print_r($data, true));
	}

/**
 * Expect Edumap->saveEdumap() to validate file asspcoated
 *   and return false on validation error
 *
 * @return void
 */
	public function testSaveEdumapByFileAssociated() {
		$frameId = 1;
		$blockId = 1;

		//データ生成
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'block_id' => $blockId,
					'key' => 'edumap_1',
					'file_id' => 0,
					Edumap::AVATAR_INPUT => array(
						'name' => 'logo.gif',
						'type' => 'image/gif',
						'tmp_name' => TESTS . 'logo.gif',
						'error' => 0,
						'size' => 5873,
					),
				),
				Edumap::AVATAR_INPUT => array(
					'File' => array(
						'status' => 1,
						'role_type' => 'room_file_role',
						'path' => '{ROOT}test{DS}1{DS}',
						'slug' => 'edumap_avatar_1',
						'extension' => 'gif',
						'original_name' => 'edumap_avatar_1',
						'mimetype' => 'image/gif',
						'name' => 'logo.gif',
						'alt' => 'logo.gif',
						'size' => 5873,
					),
					'FilesPlugin' => array(
						'plugin_key' => ''
					),
					'FilesRoom' => array(
						'room_id' => 1
					),
					'FilesUser' => array(
						'user_id' => 1
					),
				)
			)
		);

		//テスト実施
		$result = $this->Edumap->saveEdumap($data);
		$this->assertFalse($result, 'Error avatar ' . print_r($data, true));
	}

}
