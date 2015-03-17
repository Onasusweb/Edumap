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

		//Check項目
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

		//期待値
		$expected = array(
			'status' => array(
				__d('net_commons', 'Invalid request.')
			)
		);

		//テスト実施
		unset($data['Edumap']['status']);
		$this->__assertSaveEdumap('status', $data, $expected);

		foreach ($checks as $check) {
			$data['Edumap']['status'] = $check;
			$this->__assertSaveEdumap('status', $data, $expected);
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

		//Checkカラム
		$fields = array(
			'name' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'School name')),
			'handle' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Handle name')),
			'postal_code' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Postal code')),
			'prefecture_code' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Prefecture')),
			'location' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Location')),
			'tel' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Phone number')),
			'emergency_email' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Emergency contact email')),
		);
		//Check項目
		$checks = array(
			null, '', false,
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			unset($data['Edumap'][$field]);
			$this->__assertSaveEdumap($field, $data, $expected);

			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

		//Checkカラム
		$fields = array(
			'postal_code' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Postal code'), '999-9999')
		);
		//Check項目
		$checks = array(
			'9999-999', 'abc-defg', 'abcdefg', '9999999'
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

		//Checkカラム
		$fields = array(
			'prefecture_code' => __d('net_commons', 'Invalid request.'),
		);
		//Check項目
		$checks = array(
			'00', '48', '9999', 'ab', 'abcd', '--'
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

		//Checkカラム
		$fields = array(
			'tel' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Phone number'), __d('edumap', 'Phone number')),
			'fax' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Fax number'), __d('edumap', 'Fax number')),
		);
		//Check項目
		$checks = array(
			'0123456789', 'abcdefghij',
			'99-9999-9999', 'ab-cdef-ghij',
			'99(9999)9999', 'ab(cdef)ghij', '01(2345)6789', '  (    )    ',
			'+08-01-2345-6789',
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

		//Checkカラム
		$fields = array(
			'emergency_email' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Emergency contact email'), __d('edumap', 'E-mail')),
			'principal_email' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Principal email'), __d('edumap', 'E-mail')),
		);
		//Check項目
		$checks = array(
			'abcdefghij', '9999999',
			'@example.com', 'test@',
			'  @example.com', 'test@    ', 'test@    .com',
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

		//Checkカラム
		$fields = array(
			'site_url' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Site URL'), __d('edumap', 'URL')),
			'rss_url' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'RSS URL'), __d('edumap', 'URL')),
		);
		//Check項目
		$checks = array(
			'http:', 'https:', 'ftp:', 'javascript:',
			'http:/', 'https:/', 'ftp:/', 'javascript:/',
			'http://', 'https://', 'ftp://', 'javascript://',
			'http://test', 'https://test', 'ftp://test', 'javascript:test', 'abc://exapmle.com',
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

		//Checkカラム
		$fields = array(
			'foundation_date' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Foundation date'), __d('edumap', 'Date')),
			'closed_date' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Closed date'), __d('edumap', 'Date')),
		);
		//Check項目
		$checks = array(
			'201405', 'abcdef', '20140512', '2014/05/12', '0000/00', '9999/99',
		);

		foreach ($fields as $field => $message) {
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

			//期待値
			$expected = array(
				$field => array($message)
			);

			//テスト実施
			foreach ($checks as $check) {
				$data['Edumap'][$field] = $check;
				$this->__assertSaveEdumap($field, $data, $expected);
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

/**
 * __assertSaveEdumap
 *
 * @param string $field Field name
 * @param array $data Save data
 * @param array $expected Expected value
 * @return void
 */
	private function __assertSaveEdumap($field, $data, $expected) {
		//初期処理
		$this->setUp();
		//登録処理実行
		$result = $this->Edumap->saveEdumap($data);
		//戻り値テスト
		$this->assertFalse($result, 'Result error: ' . $field . ' ' . print_r($data, true));
		//validationErrorsテスト
		$this->assertEquals($this->Edumap->validationErrors, $expected,
							'Validation error: ' . $field . ' ' . print_r($this->Edumap->validationErrors, true) . print_r($data, true));
		//終了処理
		$this->tearDown();
	}

}
