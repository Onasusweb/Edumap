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
 * EdumapEditControllerEditorUser Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapEditControllerEditorUserTest extends EdumapAppControllerTest {

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
			),
		));

		$this->Controller->Auth
			->staticExpects($this->any())
			->method('user')
			->will($this->returnCallback(array($this, 'authUserCallback')));

		$this->Controller->Auth->login(array(
				'username' => 'editor',
				'password' => 'editor',
				'role_key' => 'editor',
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
			'id' => 3,
			'username' => 'editor',
			'role_key' => 'editor',
		);
		CakeSession::write('Auth.User', $user);
		return $user;
	}

/**
 * testForm method
 *
 * @return void
 */
	public function testForm() {
		$this->testAction('/edumap/edumap_edit/form/1', array('method' => 'get'));

		//登録前のForm取得
		$this->assertTextContains('<form action="', $this->view);
		$this->assertTextContains('/edumap/edumap_edit/form/1', $this->view);
		$this->assertTextContains('name="data[Edumap][name]"', $this->view);
		$this->assertTextContains('name="data[EdumapStudent][0][number]"', $this->view);
		$this->assertTextContains('name="data[EdumapSocialMedium][value]"', $this->view);
		$this->assertTextContains('type="hidden" name="data[Frame][id]"', $this->view);
		$this->assertTextContains('type="hidden" name="data[Edumap][block_id]"', $this->view);
		$this->assertTextContains('select name="data[Edumap][status]"', $this->view);
		$this->assertTextContains('type="hidden" name="data[Edumap][key]"', $this->view);
	}

/**
 * testForm2 method
 *
 * @return void
 */
	public function testForm2() {
		$this->testAction('/edumap/edumap_edit/form2/1', array('method' => 'get'));

		//登録前のForm取得
		$this->assertTextContains('<form action="', $this->view);
		$this->assertTextContains('/edumap/edumap_edit/form2/1', $this->view);
		$this->assertTextContains('name="data[EdumapVisibilityFrameSetting][name]"', $this->view);
		$this->assertTextContains('type="hidden" name="data[Frame][id]"', $this->view);
		$this->assertTextContains('type="hidden" name="data[Edumap][block_id]"', $this->view);
		$this->assertTextContains('select name="data[Edumap][status]"', $this->view);
		$this->assertTextContains('type="hidden" name="data[Edumap][key]"', $this->view);
	}

}
