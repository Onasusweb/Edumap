<?php
/**
 * Init migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Init migration
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Config\Migration
 */
class Init extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 */
	public $description = 'init';

/**
 * Actions to be performed
 *
 * @var array $migration
 */
	public $migration = array(
		'up' => array(
			'create_table' => array(
				'edumap' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID |  |  | '),
					'language_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'unsigned' => false, 'comment' => 'language id | 言語ID | languages.id | '),
					'block_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'block id | ブロックID | blocks.id | '),
					'status' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'public status, 1: public, 2: public pending, 3: draft during 4: remand | 公開状況  1:公開中、2:公開申請中、3:下書き中、4:差し戻し |  | '),
					'is_active' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'public status, 1: public, 2: public pending, 3: draft during 4: remand | 公開状況  1:公開中、2:公開申請中、3:下書き中、4:差し戻し |  | '),
					'is_latest' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'Is active, 0:deactive 1:acive | アクティブなコンテンツかどうか 0:アクティブでない 1:アクティブ | | '),
					'key' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'comment' => 'key | キー |  | ', 'charset' => 'utf8'),
					'file_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'file id | アバター ファイルID | files.id | '),
					'name' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'comment' => 'school name | 学校名 |  | ', 'charset' => 'utf8'),
					'name_kana' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'comment' => 'school kana name | 学校名カナ |  | ', 'charset' => 'utf8'),
					'handle' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'comment' => 'handle | ハンドル |  | ', 'charset' => 'utf8'),
					'postal_code' => array('type' => 'string', 'null' => true, 'length' => 8, 'collate' => 'utf8_general_ci', 'comment' => 'postal code, it\'s format "9999999" | 郵便番号(フォーマット9999999) |  | ', 'charset' => 'utf8'),
					'prefecture_code' => array('type' => 'string', 'null' => true, 'length' => 2, 'collate' => 'utf8_general_ci', 'comment' => 'prefecture code, it\'s JIS X0401 format "99" | 県コード(JIS X0401) |  | ', 'charset' => 'utf8'),
					'location' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'location | 所在地 |  | ', 'charset' => 'utf8'),
					'tel' => array('type' => 'string', 'null' => true, 'length' => 14, 'collate' => 'utf8_general_ci', 'comment' => 'tel | 電話番号 |  | ', 'charset' => 'utf8'),
					'fax' => array('type' => 'string', 'null' => true, 'length' => 14, 'collate' => 'utf8_general_ci', 'comment' => 'fax | FAX番号 |  | ', 'charset' => 'utf8'),
					'emergency_email' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'comment' => 'emergency email | 緊急連絡先eメールアドレス |  | ', 'charset' => 'utf8'),
					'inquiry' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'inquiry | お問い合わせ |  | ', 'charset' => 'utf8'),
					'site_url' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'site url | サイトURL |  | ', 'charset' => 'utf8'),
					'rss_url' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'rss url | RSS URL |  | ', 'charset' => 'utf8'),
					'foundation_date' => array('type' => 'string', 'null' => true, 'length' => 6, 'collate' => 'utf8_general_ci', 'comment' => 'founded school date | 開校日 |  | ', 'charset' => 'utf8'),
					'closed_date' => array('type' => 'string', 'null' => true, 'length' => 6, 'collate' => 'utf8_general_ci', 'comment' => 'closed school date | 閉校日 |  | ', 'charset' => 'utf8'),
					'governor_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'Governing body type, 1: National, 2: Prefectural, 3: public, 4: Municipal, 5: union standing, 6: private, 9: Other, 0: not set | 運営組織タイプ 1:国立, 2:県立, 3:公立, 4:市立, 5:組合立, 6:私立, 9:その他, 0:未設定 |  | '),
					'education_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'education type, 1: elementary school, 2: Junior High School, 3: High School, 4: Secondary School, 9: Other, 0: not set | 教育の種類 1:小学校、2:中学校、3:高等学校、4:中等教育学校、9:その他、0:未設定 |  | '),
					'coeducation_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'Coeducation type, 0: no set, 1: co-ed, 2: boy\'s school, 3: girl\'s school | 共学タイプ 0:未設定、1:共学、2:男子校、3:女子校 |  | '),
					'principal_name' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'comment' => 'principal name | 校長名 |  | ', 'charset' => 'utf8'),
					'principal_email' => array('type' => 'string', 'null' => true, 'collate' => 'utf8_general_ci', 'comment' => 'principal email | 校長eメール |  | ', 'charset' => 'utf8'),
					'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'description | 学校の概要 |  | ', 'charset' => 'utf8'),
					'translation_engine' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'translation engine | 翻訳エンジン |  | ', 'charset' => 'utf8'),
					'is_first_auto_translation' => array('type' => 'boolean', 'null' => false, 'default' => '0'),
					'is_auto_translated' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'translation type. 0:original , 1:auto translation | 翻訳タイプ  0:オリジナル、1:自動翻訳 |  | '),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'created user | 作成者 | users.id | '),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | 作成日時 |  | '),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'modified user | 更新者 | users.id | '),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | 更新日時 |  | '),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'edumap_social_media' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID |  |  | '),
					'edumap_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'edumap id | edumap ID | edumap.id | '),
					'type' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 32, 'collate' => 'utf8_general_ci', 'comment' => 'social media type, twitter:twitter, facebook:facebook | SNSタイプ  twitter:ツイッター、facebook:フェイスブック |  | ', 'charset' => 'utf8'),
					'value' => array('type' => 'string', 'null' => false, 'default' => '0', 'collate' => 'utf8_general_ci', 'comment' => 'value | SNSの値 |  | ', 'charset' => 'utf8'),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'created user | 作成者 | users.id | '),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | 作成日時 |  | '),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'modified user | 更新者 | users.id | '),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | 更新日時 |  | '),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'edumap_students' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID |  |  | '),
					'edumap_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'unsigned' => false, 'comment' => 'edumap id | edumap ID | edumap.id | '),
					'gendar' => array('type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'gendar, 0: man type, 1: woman type | 性別タイプ 1：男子、2:女子 |  | '),
					'grade' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'unsigned' => false, 'comment' => 'grade | 学年 |  | '),
					'number' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'comment' => 'people number | 人数 |  | '),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'created user | 作成者 | users.id | '),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | 作成日時 |  | '),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'modified user | 更新者 | users.id | '),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | 更新日時 |  | '),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
				'edumap_visibility_settings' => array(
					'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary', 'comment' => 'ID |  |  | '),
					'edumap_key' => array('type' => 'string', 'null' => false, 'default' => '1', 'collate' => 'utf8_general_ci', 'comment' => 'edumap key | edumapデータ連携Key | edumap.key | ', 'charset' => 'utf8'),
					'file' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display avatar\'s files.id, 1: display, 0: no display or 2:display only school officials in edumap on | 学校名の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'name' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display school name, 1: display, 0: no display or 2:display only school officials in edumap on | 学校名の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'name_kana' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display school kana name, 1: display, 0: no display or 2:display only school officials in edumap on | 学校名カナの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'handle' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display handle, 1: display, 0: no display or 2:display only school officials in edumap on | ハンドルの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'postal_code' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display postal code, 1: display, 0: no display or 2:display only school officials in edumap on | 郵便番号の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'prefecture' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display prefecture, 1: display, 0: no display or 2:display only school officials in edumap on | 都道府県の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'location' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display location, 1: display, 0: no display or 2:display only school officials in edumap on | 所在地の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'tel' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display tel number, 1: display, 0: no display or 2:display only school officials in edumap on | 電話番号の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'fax' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display fax number, 1: display, 0: no display or 2:display only school officials in edumap on | FAX番号の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'emergency_email' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display emergency email, 1: display, 0: no display or 2:display only school officials in edumap on | 緊急連絡先eメールの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'inquiry' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display inquiry, 1: display, 0: no display or 2:display only school officials in edumap on | お問い合わせの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'site_url' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display site url, 1: display, 0: no display or 2:display only school officials in edumap on | サイトURLの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'rss_url' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display rss url, 1: display, 0: no display or 2:display only school officials in edumap on | RSS URLの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'foundation_date' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display foundation date, 1: display, 0: no display or 2:display only school officials in edumap on | 開校日の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'closed_date' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display closed date, 1: display, 0: no display or 2:display only school officials in edumap on | 閉校日の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'governor_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display governor type, 1: display, 0: no display or 2:display only school officials in edumap on | 運営組織タイプの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'education_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display education type, 1: display, 0: no display or 2:display only school officials in edumap on | 教育種別の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'coeducation_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display coeducation type, 1: display, 0: no display or 2:display only school officials in edumap on | 共学種別の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'principal_name' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display principal name, 1: display, 0: no display or 2:display only school officials in edumap on |  校長名の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'principal_email' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display principal email, 1: display, 0: no display or 2:display only school officials in edumap on | 校長eメールの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示 |  | '),
					'student_number' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display student number, 1: display, 0: no display or 2:display only school officials in edumap on | 生徒数の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'social_media' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'unsigned' => false, 'comment' => 'display social media, 0: no display or 2:display only school officials in edumap on | Twitter nameの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'description' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'unsigned' => false, 'comment' => 'display school explanation, 1: display, 0: no display or 2:display only school officials in edumap on | 学校の概要の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
					'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'created user | 作成者 | users.id | '),
					'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | 作成日時 |  | '),
					'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'unsigned' => false, 'comment' => 'modified user | 更新者 | users.id | '),
					'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | 更新日時 |  | '),
					'indexes' => array(
						'PRIMARY' => array('column' => 'id', 'unique' => 1),
					),
					'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
				),
			),
		),
		'down' => array(
			'drop_table' => array(
				'edumap', 'edumap_social_media', 'edumap_students', 'edumap_visibility_settings',
			),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction Direction of migration process (up or down)
 * @return bool Should process continue
 */
	public function after($direction) {
		return true;
	}
}
