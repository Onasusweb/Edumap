<?php
/**
 * Schema file
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Schema file
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Config\Schema
 */
class EdumapSchema extends CakeSchema {

/**
 * Database connection
 *
 * @var string
 */
	public $connection = 'master';

/**
 * before
 *
 * @param array $event savent
 * @return bool
 */
	public function before($event = array()) {
		return true;
	}

/**
 * after
 *
 * @param array $event event
 * @return void
 */
	public function after($event = array()) {
	}

/**
 * Edumap table
 *
 * @var array
 */
	public $edumap = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'ID |  |  | '),
		'block_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'block id | ブロックID | blocks.id | '),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'public status, 1: public, 2: public pending, 3: draft during 4: remand | 公開状況  1:公開中、2:公開申請中、3:下書き中、4:差し戻し |  | '),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'key | キー |  | ', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'school name | 学校名 |  | ', 'charset' => 'utf8'),
		'name_kana' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'school kana name | 学校名カナ |  | ', 'charset' => 'utf8'),
		'handle' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'handle | ハンドル |  | ', 'charset' => 'utf8'),
		'postal_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 7, 'collate' => 'utf8_general_ci', 'comment' => 'postal code, it\'s format "9999999" | 郵便番号(フォーマット9999999) |  | ', 'charset' => 'utf8'),
		'prefecture_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'comment' => 'prefecture code, it\'s JIS X0401 format "99" | 県コード(JIS X0401) |  | ', 'charset' => 'utf8'),
		'location' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'location | 所在地 |  | ', 'charset' => 'utf8'),
		'tel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'comment' => 'tel | 電話番号 |  | ', 'charset' => 'utf8'),
		'fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'comment' => 'fax | FAX番号 |  | ', 'charset' => 'utf8'),
		'emergency_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'emergency email | 緊急連絡先eメールアドレス |  | ', 'charset' => 'utf8'),
		'inquiry' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'inquiry | お問い合わせ |  | ', 'charset' => 'utf8'),
		'site_url' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'site url | サイトURL |  | ', 'charset' => 'utf8'),
		'rss_url' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'rss url | RSS URL |  | ', 'charset' => 'utf8'),
		'foundation_date' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'comment' => 'founded school date | 開校日 |  | ', 'charset' => 'utf8'),
		'closed_date' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'comment' => 'closed school date | 閉校日 |  | ', 'charset' => 'utf8'),
		'governor_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'Governing body type, 1: National, 2: Prefectural, 3: public, 4: Municipal, 5: union standing, 6: private, 9: Other, 0: not set | 運営組織タイプ 1:国立, 2:県立, 3:公立, 4:市立, 5:組合立, 6:私立, 9:その他, 0:未設定 |  | '),
		'education_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'education type, 1: elementary school, 2: Junior High School, 3: High School, 4: Secondary School, 9: Other, 0: not set | 教育の種類 1:小学校、2:中学校、3:高等学校、4:中等教育学校、9:その他、0:未設定 |  | '),
		'coeducation_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'Coeducation type, 0: no set, 1: co-ed, 2: boy\'s school, 3: girl\'s school | 共学タイプ 0:未設定、1:共学、2:男子校、3:女子校 |  | '),
		'principal_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'principal name | 校長名 |  | ', 'charset' => 'utf8'),
		'principal_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'principal email | 校長eメール |  | ', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'description | 学校の概要 |  | ', 'charset' => 'utf8'),
		'is_auto_translated' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'translation type. 0:original , 1:auto translation | 翻訳タイプ  0:オリジナル、1:自動翻訳 |  | '),
		'translation_engine' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'translation engine | 翻訳エンジン |  | ', 'charset' => 'utf8'),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => 'created user | 作成者 | users.id | '),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | 作成日時 |  | '),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => 'modified user | 更新者 | users.id | '),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | 更新日時 |  | '),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
