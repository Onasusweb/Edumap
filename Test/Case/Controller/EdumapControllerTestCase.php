<?php
/**
 * EdumapController Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('NetCommonsFrameComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsBlockComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsRoomRoleComponent', 'NetCommons.Controller/Component');
App::uses('YAControllerTestCase', 'NetCommons.TestSuite');
App::uses('RolesControllerTest', 'Roles.Test/Case/Controller');
App::uses('AuthGeneralControllerTest', 'AuthGeneral.Test/Case/Controller');
App::uses('Edumap', 'Edumap.Model');
App::uses('EdumapSocialMedium', 'Edumap.Model');
App::uses('EdumapVisibilitySetting', 'Edumap.Model');

/**
 * EdumapController Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class EdumapControllerTestCase extends YAControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.net_commons.site_setting',
		'plugin.blocks.block_role_permission',
		'plugin.boxes.boxes_page',
		'plugin.containers.container',
		'plugin.containers.containers_page',
		'plugin.edumap.block',
		'plugin.edumap.comment',
		'plugin.edumap.edumap',
		'plugin.edumap.edumap_social_medium',
		'plugin.edumap.edumap_student',
		'plugin.edumap.edumap_visibility_setting',
		'plugin.edumap.frame',
		'plugin.edumap.plugin',
		'plugin.edumap.user_attributes_user',
		'plugin.edumap.user',
		'plugin.files.file',
		'plugin.files.files_plugin',
		'plugin.files.files_room',
		'plugin.files.files_user',
		'plugin.frames.box',
		'plugin.m17n.language',
		'plugin.m17n.languages_page',
		'plugin.pages.page',
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
		Configure::write('Config.language', 'ja');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		Configure::write('Config.language', null);
		CakeSession::write('Auth.User', null);
		parent::tearDown();
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
