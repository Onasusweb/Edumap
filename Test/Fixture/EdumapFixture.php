<?php
/**
 * EdumapFixture
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * EdumapFixture
 */
class EdumapFixture extends CakeTestFixture {

/**
 * Full Table Name
 *
 * @var string
 */
	public $table = 'edumap';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'ID |  |  | '),
		'language_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 6, 'comment' => 'language id | 言語ID | languages.id | '),
		'block_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'block id | ブロックID | blocks.id | '),
		'status' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'comment' => 'public status, 1: public, 2: public pending, 3: draft during 4: remand | 公開状況  1:公開中、2:公開申請中、3:下書き中、4:差し戻し |  | '),
		'is_active' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'public status, 1: public, 2: public pending, 3: draft during 4: remand | 公開状況  1:公開中、2:公開申請中、3:下書き中、4:差し戻し |  | '),
		'is_latest' => array('type' => 'boolean', 'null' => true, 'default' => '0', 'comment' => 'Is active, 0:deactive 1:acive | アクティブなコンテンツかどうか 0:アクティブでない 1:アクティブ | | '),
		'key' => array('type' => 'string', 'null' => false, 'collate' => 'utf8_general_ci', 'comment' => 'key | キー |  | ', 'charset' => 'utf8'),
		'file_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'file id | アバター ファイルID | files.id | '),
		'name' => array('type' => 'string', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'school name | 学校名 |  | ', 'charset' => 'utf8'),
		'name_kana' => array('type' => 'string', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'school kana name | 学校名カナ |  | ', 'charset' => 'utf8'),
		'handle' => array('type' => 'string', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'handle | ハンドル |  | ', 'charset' => 'utf8'),
		'postal_code' => array('type' => 'string', 'null' => true, 'default' => '', 'length' => 8, 'collate' => 'utf8_general_ci', 'comment' => 'postal code, it\'s format "9999999" | 郵便番号(フォーマット9999999) |  | ', 'charset' => 'utf8'),
		'prefecture_code' => array('type' => 'string', 'null' => true, 'default' => '', 'length' => 2, 'collate' => 'utf8_general_ci', 'comment' => 'prefecture code, it\'s JIS X0401 format "99" | 県コード(JIS X0401) |  | ', 'charset' => 'utf8'),
		'location' => array('type' => 'text', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'location | 所在地 |  | ', 'charset' => 'utf8'),
		'tel' => array('type' => 'string', 'null' => true, 'default' => '', 'length' => 14, 'collate' => 'utf8_general_ci', 'comment' => 'tel | 電話番号 |  | ', 'charset' => 'utf8'),
		'fax' => array('type' => 'string', 'null' => true, 'default' => '', 'length' => 14, 'collate' => 'utf8_general_ci', 'comment' => 'fax | FAX番号 |  | ', 'charset' => 'utf8'),
		'emergency_email' => array('type' => 'string', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'emergency email | 緊急連絡先eメールアドレス |  | ', 'charset' => 'utf8'),
		'inquiry' => array('type' => 'text', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'inquiry | お問い合わせ |  | ', 'charset' => 'utf8'),
		'site_url' => array('type' => 'text', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'site url | サイトURL |  | ', 'charset' => 'utf8'),
		'rss_url' => array('type' => 'text', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'rss url | RSS URL |  | ', 'charset' => 'utf8'),
		'foundation_date' => array('type' => 'string', 'null' => true, 'default' => '', 'length' => 6, 'collate' => 'utf8_general_ci', 'comment' => 'founded school date | 開校日 |  | ', 'charset' => 'utf8'),
		'closed_date' => array('type' => 'string', 'null' => true, 'default' => '', 'length' => 6, 'collate' => 'utf8_general_ci', 'comment' => 'closed school date | 閉校日 |  | ', 'charset' => 'utf8'),
		'governor_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'Governing body type, 1: National, 2: Prefectural, 3: public, 4: Municipal, 5: union standing, 6: private, 9: Other, 0: not set | 運営組織タイプ 1:国立, 2:県立, 3:公立, 4:市立, 5:組合立, 6:私立, 9:その他, 0:未設定 |  | '),
		'education_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'education type, 1: elementary school, 2: Junior High School, 3: High School, 4: Secondary School, 9: Other, 0: not set | 教育の種類 1:小学校、2:中学校、3:高等学校、4:中等教育学校、9:その他、0:未設定 |  | '),
		'coeducation_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'Coeducation type, 0: no set, 1: co-ed, 2: boy\'s school, 3: girl\'s school | 共学タイプ 0:未設定、1:共学、2:男子校、3:女子校 |  | '),
		'principal_name' => array('type' => 'string', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'principal name | 校長名 |  | ', 'charset' => 'utf8'),
		'principal_email' => array('type' => 'string', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'principal email | 校長eメール |  | ', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => '', 'collate' => 'utf8_general_ci', 'comment' => 'description | 学校の概要 |  | ', 'charset' => 'utf8'),
		'translation_engine' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'translation engine | 翻訳エンジン |  | ', 'charset' => 'utf8'),
		'is_first_auto_translation' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => ''),
		'is_auto_translated' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'translation type. 0:original , 1:auto translation | 翻訳タイプ  0:オリジナル、1:自動翻訳 |  | '),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => 'created user | 作成者 | users.id | '),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | 作成日時 |  | '),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => 'modified user | 更新者 | users.id | '),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | 更新日時 |  | '),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB'),
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'language_id' => 2,
			'block_id' => 121,
			'status' => 1,
			'is_active' => 1,
			'is_latest' => 0,
			'key' => 'edumap_1',
			'file_id' => 1,
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
		array(
			'id' => 2,
			'language_id' => 2,
			'block_id' => 121,
			'status' => 3,
			'is_active' => 0,
			'is_latest' => 1,
			'key' => 'edumap_1',
			'file_id' => 1,
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
		array(
			'id' => 3,
			'language_id' => 2,
			'block_id' => 122,
			'status' => 1,
			'is_active' => 1,
			'is_latest' => 1,
			'key' => 'edumap_2',
			'file_id' => 0,
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
	);

}
