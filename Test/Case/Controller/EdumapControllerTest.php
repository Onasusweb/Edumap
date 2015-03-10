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

App::uses('EdumapController', 'Edumap.Controller');
App::uses('EdumapControllerTestBase', 'Edumap.Test/Case/Controller');

/**
 * EdumapController Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 * @SuppressWarnings(PHPMD.TooManyMethods)
 */
class EdumapControllerTest extends EdumapControllerTestBase {

/**
 * default value
 *
 * @var array
 */
	private $__saveDefault = array(
		'Edumap' => array(
			'name' => 'Edit name',
			'name_kana' => 'Edit name_kana',
			'handle' => 'Edit handle',
			'postal_code' => '123-4567',
			'prefecture_code' => '01',
			'location' => 'Edit location',
			'tel' => '01-2345-6789',
			'fax' => '09-8765-4321',
			'emergency_email' => 'emergency@example.com',
			'inquiry' => 'Edit inquiry',
			'site_url' => 'http://site.example.com',
			'rss_url' => 'http://rss.example.com',
			'foundation_date' => array('year' => '1945', 'month' => '12'),
			'closed_date' => array('year' => '2015', 'month' => '04'),
			'governor_type' => '3',
			'education_type' => '4',
			'coeducation_type' => '2',
			'principal_name' => 'Edit principal_name',
			'principal_email' => 'principal@example.com',
			'description' => 'Edit description',
		),
		'EdumapSocialMedium' => array(
			EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
				'value' => 'EditTwitterValue',
				'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
			)
		),
		'EdumapStudent' => array(
				array('grade' => '1', 'gendar' => false, 'number' => ''),
				array('grade' => '1', 'gendar' => true, 'number' => ''),
				array('grade' => '2', 'gendar' => false, 'number' => '123'),
				array('grade' => '2', 'gendar' => true, 'number' => '456'),
				array('grade' => '3', 'gendar' => false, 'number' => '789'),
				array('grade' => '3', 'gendar' => true, 'number' => ''),
				array('grade' => '4', 'gendar' => false, 'number' => ''),
				array('grade' => '4', 'gendar' => true, 'number' => '654'),
				array('grade' => '5', 'gendar' => false, 'number' => ''),
				array('grade' => '5', 'gendar' => true, 'number' => ''),
				array('grade' => '6', 'gendar' => false, 'number' => ''),
				array('grade' => '6', 'gendar' => true, 'number' => ''),
		),
		'Comment' => array(
			'comment' => 'Edit comment'
		),
		Edumap::AVATAR_INPUT => array(
			'FilesPlugin' => array(
				'plugin_key' => 'edumap'
			),
			'FilesRoom' => array(
				'room_id' => 1
			),
			'FilesUser' => array(
				'user_id' => 1
			),
		),
		'DeleteFile' => array(array('File' => array('id' => '0')))
	);

/**
 * Expect visitor can access index action
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction(
			'/edumap/edumap/index/1',
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);

		$this->assertTextEquals('Edumap/view', $this->controller->view);
	}

/**
 * Expect visitor can access view action
 *
 * @return void
 */
	public function testView() {
		$this->testAction(
			'/edumap/edumap/view/1',
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);

		$this->assertTextEquals('view', $this->controller->view);
	}

/**
 * Expect visitor can access view action by json
 *
 * @return void
 */
	public function testViewJson() {
		$ret = $this->testAction(
			'/edumap/edumap/view/1.json',
			array(
				'method' => 'get',
				'type' => 'json',
				'return' => 'contents',
			)
		);
		$result = json_decode($ret, true);

		$this->assertTextEquals('view', $this->controller->view);
		$this->assertArrayHasKey('code', $result, print_r($result, true));
		$this->assertEquals(200, $result['code'], print_r($result, true));
	}

/**
 * Expect admin user can access view action
 *
 * @return void
 */
	public function testViewByAdmin() {
		$this->_generateController('Edumap.Edumap');
		RolesControllerTest::login($this);

		$folder = new Folder();
		$folder->create(TMP . 'tests' . DS . 'test' . DS . '1');
		$file = new File(
			APP . 'Plugin' . DS . 'Files' . DS . 'Test' . DS . 'Fixture' . DS . 'logo.gif'
		);
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_big.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_medium.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_small.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_thumbnail.gif');
		$file->close();

		$view = $this->testAction(
			'/edumap/edumap/view/1',
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);

		$this->assertTextEquals('Edumap/viewForEditor', $this->controller->view);
		$this->assertTextContains('nc-edumap-1', $view, print_r($view, true));
		$this->assertTextContains('/edumap/edumap/edit/1', $view, print_r($view, true));

		$folder->delete(TMP . 'tests' . DS . 'test');
		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect user cannot access view action with unknown frame id
 *
 * @return void
 */
	public function testViewByUnkownFrameId() {
		$this->setExpectedException('InternalErrorException');
		$this->testAction(
			'/edumap/edumap/view/999',
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);
	}

/**
 * Expect admin user can access edit action
 *
 * @return void
 */
	public function testEditGet() {
		$this->_generateController('Edumap.Edumap');
		RolesControllerTest::login($this);

		$folder = new Folder();
		$folder->create(TMP . 'tests' . DS . 'test' . DS . '1');
		$file = new File(
			APP . 'Plugin' . DS . 'Files' . DS . 'Test' . DS . 'Fixture' . DS . 'logo.gif'
		);
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_big.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_medium.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_small.gif');
		$file->copy(TMP . 'tests' . DS . 'test' . DS . '1' . DS . 'logo_hash_thumbnail.gif');
		$file->close();

		$this->testAction(
			'/edumap/edumap/edit/1',
			array(
				'method' => 'get',
				'return' => 'contents'
			)
		);
		$this->assertTextEquals('edit', $this->controller->view);

		$folder->delete(TMP . 'tests' . DS . 'test');
		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user can access edit action
 *
 * @return void
 */
	public function testEditGetWithoutBlock() {
		$this->_generateController('Edumap.Edumap');
		RolesControllerTest::login($this);

		$this->testAction(
			'/edumap/edumap/edit/3',
			array(
				'method' => 'get',
				'return' => 'contents'
			)
		);
		$this->assertTextEquals('edit', $this->controller->view);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect view action to be successfully handled w/ null frame.block_id
 * This situation typically occur after placing new plugin into page
 *
 * @return void
 */
	public function testAddFrameWithoutBlock() {
		$this->testAction(
			'/edumap/edumap/view/3',
			array(
				'method' => 'get',
				'return' => 'contents'
			)
		);
		$this->assertTextEquals('view', $this->controller->view);
	}

/**
 * Expect admin user can publish edumap
 *
 * @return void
 */
	public function testEditPost() {
		$this->_generateController('Edumap.Edumap');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 1;
		$blockId = 1;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'id' => '',
					'key' => 'edumap_1',
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_PUBLISHED) => ''
			)
		);

		//テスト実行
		$this->testAction(
			'/edumap/edumap/edit/' . $frameId,
			array(
				'method' => 'post',
				'data' => $data,
				'return' => 'contents'
			)
		);
		$this->assertTextEquals('edit', $this->controller->view);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user can publish edumap
 *
 * @return void
 */
	public function testEditPostWithoutBlock() {
		$this->_generateController('Edumap.Edumap');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 3;
		$blockId = '';

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'id' => '',
					'key' => 'edumap_3',
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_PUBLISHED) => ''
			)
		);

		//テスト実行
		$this->testAction(
			'/edumap/edumap/edit/' . $frameId,
			array(
				'method' => 'post',
				'data' => $data,
				'return' => 'contents'
			)
		);
		$this->assertTextEquals('edit', $this->controller->view);

		AuthGeneralControllerTest::logout($this);
	}

/**
 * Expect admin user can publish edumap
 *
 * @return void
 */
	public function testEditPostUnknownInputs() {
		$this->_generateController('Edumap.Edumap');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 1;
		$blockId = 1;

		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'Edumap' => array(
					'id' => '',
					'key' => 'edumap_1',
					'name_kana' => '',
					'fax' => '',
					'inquiry' => '',
					'site_url' => '',
					'rss_url' => '',
					'foundation_date' => array('year' => '', 'month' => ''),
					'closed_date' => array('year' => '', 'month' => ''),
					'governor_type' => '0',
					'education_type' => '0',
					'coeducation_type' => '0',
					'principal_name' => '',
					'principal_email' => '',
					'description' => '',
				),
				'EdumapSocialMedium' => array(
					EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
						'value' => '',
					)
				),
				'EdumapStudent' => array(
					array('grade' => '1', 'gendar' => false, 'number' => ''),
					array('grade' => '1', 'gendar' => true, 'number' => ''),
					array('grade' => '2', 'gendar' => false, 'number' => ''),
					array('grade' => '2', 'gendar' => true, 'number' => ''),
					array('grade' => '3', 'gendar' => false, 'number' => ''),
					array('grade' => '3', 'gendar' => true, 'number' => ''),
					array('grade' => '4', 'gendar' => false, 'number' => ''),
					array('grade' => '4', 'gendar' => true, 'number' => ''),
					array('grade' => '5', 'gendar' => false, 'number' => ''),
					array('grade' => '5', 'gendar' => true, 'number' => ''),
					array('grade' => '6', 'gendar' => false, 'number' => ''),
					array('grade' => '6', 'gendar' => true, 'number' => ''),
				),
				sprintf('save_%s', NetCommonsBlockComponent::STATUS_PUBLISHED) => ''
			)
		);

		//テスト実行
		$this->testAction(
			'/edumap/edumap/edit/' . $frameId,
			array(
				'method' => 'post',
				'data' => $data,
				'return' => 'contents'
			)
		);
		$this->assertTextEquals('edit', $this->controller->view);

		AuthGeneralControllerTest::logout($this);
	}

}
