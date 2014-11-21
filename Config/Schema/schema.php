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
		'block_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'comment' => 'block id | �u���b�NID | blocks.id | '),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'public status, 1: public, 2: public pending, 3: draft during 4: remand | ���J��  1:���J���A2:���J�\�����A3:���������A4:�����߂� |  | '),
		'key' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'key | �L�[ |  | ', 'charset' => 'utf8'),
		'name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'school name | �w�Z�� |  | ', 'charset' => 'utf8'),
		'name_kana' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'school kana name | �w�Z���J�i |  | ', 'charset' => 'utf8'),
		'handle' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'handle | �n���h�� |  | ', 'charset' => 'utf8'),
		'postal_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 7, 'collate' => 'utf8_general_ci', 'comment' => 'postal code, it\'s format "9999999" | �X�֔ԍ�(�t�H�[�}�b�g9999999) |  | ', 'charset' => 'utf8'),
		'prefecture_code' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 2, 'collate' => 'utf8_general_ci', 'comment' => 'prefecture code, it\'s JIS X0401 format "99" | ���R�[�h(JIS X0401) |  | ', 'charset' => 'utf8'),
		'location' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'location | ���ݒn |  | ', 'charset' => 'utf8'),
		'tel' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'comment' => 'tel | �d�b�ԍ� |  | ', 'charset' => 'utf8'),
		'fax' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 13, 'collate' => 'utf8_general_ci', 'comment' => 'fax | FAX�ԍ� |  | ', 'charset' => 'utf8'),
		'emergency_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'emergency email | �ً}�A����e���[���A�h���X |  | ', 'charset' => 'utf8'),
		'inquiry' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'inquiry | ���₢���킹 |  | ', 'charset' => 'utf8'),
		'site_url' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'site url | �T�C�gURL |  | ', 'charset' => 'utf8'),
		'rss_url' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'rss url | RSS URL |  | ', 'charset' => 'utf8'),
		'foundation_date' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'comment' => 'founded school date | �J�Z�� |  | ', 'charset' => 'utf8'),
		'closed_date' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'comment' => 'closed school date | �Z�� |  | ', 'charset' => 'utf8'),
		'governor_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'Governing body type, 1: National, 2: Prefectural, 3: public, 4: Municipal, 5: union standing, 6: private, 9: Other, 0: not set | �^�c�g�D�^�C�v 1:����, 2:����, 3:����, 4:�s��, 5:�g����, 6:����, 9:���̑�, 0:���ݒ� |  | '),
		'education_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'education type, 1: elementary school, 2: Junior High School, 3: High School, 4: Secondary School, 9: Other, 0: not set | ����̎�� 1:���w�Z�A2:���w�Z�A3:�����w�Z�A4:��������w�Z�A9:���̑��A0:���ݒ� |  | '),
		'coeducation_type' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'comment' => 'Coeducation type, 0: no set, 1: co-ed, 2: boy\'s school, 3: girl\'s school | ���w�^�C�v 0:���ݒ�A1:���w�A2:�j�q�Z�A3:���q�Z |  | '),
		'principal_name' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'principal name | �Z���� |  | ', 'charset' => 'utf8'),
		'principal_email' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'principal email | �Z��e���[�� |  | ', 'charset' => 'utf8'),
		'description' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'description | �w�Z�̊T�v |  | ', 'charset' => 'utf8'),
		'is_auto_translated' => array('type' => 'boolean', 'null' => false, 'default' => '0', 'comment' => 'translation type. 0:original , 1:auto translation | �|��^�C�v  0:�I���W�i���A1:�����|�� |  | '),
		'translation_engine' => array('type' => 'string', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'translation engine | �|��G���W�� |  | ', 'charset' => 'utf8'),
		'created_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => 'created user | �쐬�� | users.id | '),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'created datetime | �쐬���� |  | '),
		'modified_user' => array('type' => 'integer', 'null' => true, 'default' => '0', 'comment' => 'modified user | �X�V�� | users.id | '),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null, 'comment' => 'modified datetime | �X�V���� |  | '),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

}
