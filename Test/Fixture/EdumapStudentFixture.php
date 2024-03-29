<?php
/**
 * EdumapStudentFixture
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * EdumapStudentFixture
 */
class EdumapStudentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary', 'comment' => 'ID |  |  | '),
		'edumap_id' => array('type' => 'integer', 'null' => false, 'default' => '0', 'comment' => 'edumap id | edumap ID | edumap.id | '),
		'gendar' => array('type' => 'boolean', 'null' => true, 'default' => null, 'comment' => 'gendar, 0: man type, 1: woman type | 性別タイプ 1：男子、2:女子 |  | '),
		'grade' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 4, 'comment' => 'grade | 学年 |  | '),
		'number' => array('type' => 'integer', 'null' => true, 'default' => null, 'comment' => 'people number | 人数 |  | '),
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
			'edumap_id' => 1,
			'gendar' => 0,
			'grade' => 1,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 2,
			'edumap_id' => 1,
			'gendar' => 1,
			'grade' => 1,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 3,
			'edumap_id' => 1,
			'gendar' => 0,
			'grade' => 2,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 4,
			'edumap_id' => 1,
			'gendar' => 1,
			'grade' => 2,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 5,
			'edumap_id' => 1,
			'gendar' => 0,
			'grade' => 3,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 6,
			'edumap_id' => 1,
			'gendar' => 1,
			'grade' => 3,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 7,
			'edumap_id' => 1,
			'gendar' => 0,
			'grade' => 4,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 8,
			'edumap_id' => 1,
			'gendar' => 1,
			'grade' => 4,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 9,
			'edumap_id' => 1,
			'gendar' => 0,
			'grade' => 5,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 10,
			'edumap_id' => 1,
			'gendar' => 1,
			'grade' => 5,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 11,
			'edumap_id' => 1,
			'gendar' => 0,
			'grade' => 6,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
		array(
			'id' => 12,
			'edumap_id' => 1,
			'gendar' => 1,
			'grade' => 6,
			'number' => 1,
			'created_user' => 1,
			'created' => '2014-11-18 03:17:30',
			'modified_user' => 1,
			'modified' => '2014-11-18 03:17:30'
		),
	);

}
