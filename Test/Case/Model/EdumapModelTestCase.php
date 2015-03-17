<?php
/**
 * Edumap Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsBlockComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsRoomRoleComponent', 'NetCommons.Controller/Component');
App::uses('Edumap', 'Edumap.Model');
App::uses('EdumapStudent', 'Edumap.Model');
App::uses('EdumapSocialMedium', 'Edumap.Model');
App::uses('EdumapVisibilitySetting', 'Edumap.Model');
App::uses('FileModel', 'Files.Model');
App::uses('YACakeTestCase', 'NetCommons.TestSuite');
App::uses('AuthComponent', 'Component');

/**
 * Edumap Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapModelTestCase extends YACakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.edumap.block',
		'plugin.edumap.comment',
		'plugin.edumap.edumap',
		'plugin.edumap.edumap_social_medium',
		'plugin.edumap.edumap_student',
		'plugin.edumap.edumap_visibility_setting',
		'plugin.edumap.frame',
		'plugin.edumap.plugin',
		'plugin.edumap.user',
		'plugin.edumap.user_attributes_user',
		'plugin.files.file',
		'plugin.files.files_plugin',
		'plugin.files.files_room',
		'plugin.files.files_user',
		'plugin.frames.box',
		'plugin.m17n.language',
		'plugin.rooms.room',
		'plugin.rooms.roles_rooms_user',
		'plugin.roles.default_role_permission',
		'plugin.rooms.roles_room',
		'plugin.rooms.room_role_permission',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Edumap = ClassRegistry::init('Edumap.Edumap');
		$this->EdumapStudent = ClassRegistry::init('Edumap.EdumapStudent');
		$this->EdumapSocialMedium = ClassRegistry::init('Edumap.EdumapSocialMedium');
		$this->EdumapVisibilitySetting = ClassRegistry::init('Edumap.EdumapVisibilitySetting');
		$this->FileModel = ClassRegistry::init('Files.FileModel');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Edumap);
		unset($this->EdumapStudent);
		unset($this->EdumapSocialMedium);
		unset($this->EdumapVisibilitySetting);
		unset($this->FileModel);
		parent::tearDown();
	}

/**
 * _assertArray method
 *
 * @param string $key target key
 * @param mixed $value array or string, number
 * @param array $result result data
 * @return void
 */
	protected function _assertArray($key, $value, $result) {
		if ($key !== null) {
			$this->assertArrayHasKey($key, $result);
			$target = $result[$key];
		} else {
			$target = $result;
		}
		if (is_array($value)) {
			foreach ($value as $nextKey => $nextValue) {
				$this->_assertArray($nextKey, $nextValue, $target);
			}
		} elseif (isset($value)) {
			$this->assertEquals($value, $target, 'key=' . print_r($key, true) . '|value=' . print_r($value, true) . '|result=' . print_r($result, true));
		}
	}

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->assertTrue(true);
	}

}
