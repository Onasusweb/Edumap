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
class EdumapModelTestBase extends YACakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.comments.comment',
		'plugin.edumap.edumap',
		'plugin.edumap.edumap_social_medium',
		'plugin.edumap.edumap_student',
		'plugin.edumap.edumap_visibility_setting',
		'plugin.files.file',
		'plugin.files.files_plugin',
		'plugin.files.files_room',
		'plugin.files.files_user',
	);

/**
 * Test case of notBlank
 *
 * @var array
 */
	public $testCaseNotEmpty = array(
		null, '', false,
	);

/**
 * Test case of boolean
 *
 * @var array
 */
	public $testCaseBoolean = array(
		null, '', 'a', '99', 'false', 'true'
	);

/**
 * Test case of number
 *
 * @var array
 */
	public $testCaseNumber = array(
		null, '', 'abcde', false, true, '123abcd', 'false', 'true'
	);

/**
 * Test case of status
 *
 * @var array
 */
	public $testCaseStatus = array(
		null, '', -1, 0, 5, 9999, 'abcde', false,
	);

/**
 * Test case of postal
 *
 * @var array
 */
	public $testCasePostal = array(
		'9999-999', 'abc-defg', 'abcdefg', '9999999'
	);

/**
 * Test case of prefecture
 *
 * @var array
 */
	public $testCasePrefecture = array(
		'00', '48', '9999', 'ab', 'abcd', '--'
	);

/**
 * Test case of phone
 *
 * @var array
 */
	public $testCasePhone = array(
		'0123456789', 'abcdefghij',
		'99-9999-9999', 'ab-cdef-ghij',
		'99(9999)9999', 'ab(cdef)ghij', '01(2345)6789', '  (    )    ',
		'+08-01-2345-6789',
	);

/**
 * Test case of email
 *
 * @var array
 */
	public $testCaseEmail = array(
		'abcdefghij', '9999999',
		'@example.com', 'test@',
		'  @example.com', 'test@    ', 'test@    .com',
	);

/**
 * Test case of url
 *
 * @var array
 */
	public $testCaseUrl = array(
		'http:', 'https:', 'ftp:', 'javascript:',
		'http:/', 'https:/', 'ftp:/', 'javascript:/',
		'http://', 'https://', 'ftp://', 'javascript://',
		'http://test', 'https://test', 'ftp://test', 'javascript:test', 'abc://exapmle.com',
	);

/**
 * Test case of date
 *
 * @var array
 */
	public $testCaseDate = array(
		'201405', 'abcdef', '20140512', '2014/05/12', '0000/00', '9999/99',
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		//$this->Edumap = ClassRegistry::init('Edumap.Edumap');
		//$this->EdumapStudent = ClassRegistry::init('Edumap.EdumapStudent');
		//$this->EdumapSocialMedium = ClassRegistry::init('Edumap.EdumapSocialMedium');
		//$this->EdumapVisibilitySetting = ClassRegistry::init('Edumap.EdumapVisibilitySetting');
		//$this->FileModel = ClassRegistry::init('Files.FileModel');
		//$this->Block = ClassRegistry::init('Blocks.Block');
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
}
