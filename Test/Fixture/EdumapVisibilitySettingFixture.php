<?php
/**
 * EdumapVisibilitySettingFixture
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * EdumapVisibilitySettingFixture
 */
class EdumapVisibilitySettingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'ID |  |  | '),
		'edumap_key' => array('type' => 'string', 'null' => false, 'default' => '1', 'collate' => 'utf8_general_ci', 'comment' => 'edumap key | edumapデータ連携Key | edumap.key | ', 'charset' => 'utf8'),
		'file' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display avatar\'s files.id, 1: display, 0: no display or 2:display only school officials in edumap on | 学校名の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'name' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display school name, 1: display, 0: no display or 2:display only school officials in edumap on | 学校名の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'name_kana' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display school kana name, 1: display, 0: no display or 2:display only school officials in edumap on | 学校名カナの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'handle' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display handle, 1: display, 0: no display or 2:display only school officials in edumap on | ハンドルの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'postal_code' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display postal code, 1: display, 0: no display or 2:display only school officials in edumap on | 郵便番号の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'prefecture' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display prefecture, 1: display, 0: no display or 2:display only school officials in edumap on | 都道府県の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'location' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display location, 1: display, 0: no display or 2:display only school officials in edumap on | 所在地の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'tel' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display tel number, 1: display, 0: no display or 2:display only school officials in edumap on | 電話番号の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'fax' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display fax number, 1: display, 0: no display or 2:display only school officials in edumap on | FAX番号の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'emergency_email' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display emergency email, 1: display, 0: no display or 2:display only school officials in edumap on | 緊急連絡先eメールの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'inquiry' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display inquiry, 1: display, 0: no display or 2:display only school officials in edumap on | お問い合わせの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'site_url' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display site url, 1: display, 0: no display or 2:display only school officials in edumap on | サイトURLの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'rss_url' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display rss url, 1: display, 0: no display or 2:display only school officials in edumap on | RSS URLの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'foundation_date' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display foundation date, 1: display, 0: no display or 2:display only school officials in edumap on | 開校日の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'closed_date' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display closed date, 1: display, 0: no display or 2:display only school officials in edumap on | 閉校日の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'governor_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display governor type, 1: display, 0: no display or 2:display only school officials in edumap on | 運営組織タイプの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'education_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display education type, 1: display, 0: no display or 2:display only school officials in edumap on | 教育種別の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'coeducation_type' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display coeducation type, 1: display, 0: no display or 2:display only school officials in edumap on | 共学種別の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'principal_name' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display principal name, 1: display, 0: no display or 2:display only school officials in edumap on |  校長名の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'principal_email' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display principal email, 1: display, 0: no display or 2:display only school officials in edumap on | 校長eメールの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示 |  | '),
		'student_number' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display student number, 1: display, 0: no display or 2:display only school officials in edumap on | 生徒数の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'social_media' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4, 'comment' => 'display social media, 0: no display or 2:display only school officials in edumap on | Twitter nameの表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
		'description' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4, 'comment' => 'display school explanation, 1: display, 0: no display or 2:display only school officials in edumap on | 学校の概要の表示の有無  0:表示しない、1:表示する、2:edumap上で学校関係のみ表示する |  | '),
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
			'edumap_key' => 'edumap_1',
			'file' => 1,
			'name' => 1,
			'name_kana' => 1,
			'handle' => 1,
			'postal_code' => 1,
			'prefecture' => 1,
			'location' => 1,
			'tel' => 1,
			'fax' => 1,
			'emergency_email' => 1,
			'inquiry' => 1,
			'site_url' => 1,
			'rss_url' => 1,
			'foundation_date' => 1,
			'closed_date' => 1,
			'governor_type' => 1,
			'education_type' => 1,
			'coeducation_type' => 1,
			'principal_name' => 1,
			'principal_email' => 1,
			'student_number' => 1,
			'social_media' => 1,
			'description' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:02',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:02'
		),
	);

}
