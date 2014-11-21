<?php
/**
 * EdumapEditController Test Case
 *
* @author   Jun Nishikawa <topaz2@m0n0m0n0.com>
* @link     http://www.netcommons.org NetCommons Project
* @license  http://www.netcommons.org/license.txt NetCommons License
 */
App::uses('EdumapAppControllerTest', 'Edumap.Test/Case/Controller');
App::uses('EdumapController', 'Edumap.Controller');
App::uses('NetCommonsFrameComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsBlockComponent', 'NetCommons.Controller/Component');
App::uses('NetCommonsRoomRoleComponent', 'NetCommons.Controller/Component');

/**
 * EdumapEditControllerNCFrameError Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapEditControllerNCFrameErrorTest extends EdumapAppControllerTest {

/**
 * mock controller object
 *
 * @var Controller
 */
	public $Controller = null;


/**
 * setUp
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		Configure::write('Config.language', 'ja');
		$this->login();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		$this->logout();
		Configure::write('Config.language', null);
		parent::tearDown();
	}

/**
 * login　method
 *
 * @return void
 */
	public function login() {
		//ログイン処理
		$this->Controller = $this->generate('Edumap.EdumapEdit', array(
			'components' => array(
				'Auth' => array('user'),
				'Session',
				'Security',
				'RequestHandler',
				'NetCommons.NetCommonsFrame',
			),
		));

		$this->Controller->NetCommonsFrame
			->staticExpects($this->any())
			->method('setView')
			->will($this->returnValue(false));

		$this->Controller->Auth
			->staticExpects($this->any())
			->method('user')
			->will($this->returnCallback(array($this, 'authUserCallback')));

		$this->Controller->Auth->login(array(
				'username' => 'admin',
				'password' => 'admin',
				'role_key' => 'system_administrator',
			)
		);
		$this->assertTrue($this->Controller->Auth->loggedIn(), 'login');
	}

/**
 * logout method
 *
 * @return void
 */
	public function logout() {
		//ログアウト処理
		$this->Controller->Auth->logout();
		$this->assertFalse($this->Controller->Auth->loggedIn(), 'logout');

		CakeSession::write('Auth.User', null);
		unset($this->Controller);
	}

/**
 * authUserCallback method
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @return array user
 */
	public function authUserCallback() {
		$user = array(
			'id' => 1,
			'username' => 'admin',
			'role_key' => 'system_administrator',
		);
		CakeSession::write('Auth.User', $user);
		return $user;
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap_edit/view/1', array('method' => 'get'));
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$postData = array(
			'Edumap' => array(
				'block_id' => null,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
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
			'EdumapStudent' => array(
				'0' => array(
					'number' => 1,
				)
			),
			'EdumapSocialMedium' => array(
				'type' => 'twitter',
				'value' => 'Lorem ipsum dolor sit amet',
			),
			'EdumapVisibilityFrameSetting' => array(
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
			),
			'Frame' => array(
				'id' => '1'
			)
		);

		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap_edit/edit/1.json',
			array(
				'method' => 'post',
				'data' => $postData
			)
		);
	}

/**
 * testView2 method
 *
 * @return void
 */
	public function testView2() {
		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap_edit/view2/1', array('method' => 'get'));
	}

/**
 * testEdit2 method
 *
 * @return void
 */
	public function testEdit2() {
		$postData = array(
			'Edumap' => array(
				'block_id' => null,
				'status' => 1,
				'key' => 'Lorem ipsum dolor sit amet',
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
			'EdumapStudent' => array(
				'0' => array(
					'number' => 1,
				)
			),
			'EdumapSocialMedium' => array(
				'type' => 'twitter',
				'value' => 'Lorem ipsum dolor sit amet',
			),
			'EdumapVisibilityFrameSetting' => array(
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
			),
			'Frame' => array(
				'id' => '1'
			)
		);

		$this->setExpectedException('ForbiddenException');
		$this->testAction('/edumap/edumap_edit/edit2/1.json',
			array(
				'method' => 'post',
				'data' => $postData
			)
		);
	}

}
