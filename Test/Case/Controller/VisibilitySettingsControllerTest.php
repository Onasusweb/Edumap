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

App::uses('VisibilitySettingsController', 'Edumap.Controller');
App::uses('EdumapControllerTestBase', 'Edumap.Test/Case/Controller');

/**
 * EdumapController Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class VisibilitySettingsControllerTest extends EdumapControllerTestBase {

/**
 * default value
 *
 * @var array
 */
	private $__saveDefault = array(
		'EdumapVisibilitySetting' => array(
			'file' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'name_kana' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'handle' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'postal_code' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'prefecture' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'location' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'tel' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'fax' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'emergency_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'inquiry' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'site_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'rss_url' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'foundation_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'closed_date' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'governor_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'education_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'coeducation_type' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'principal_name' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'principal_email' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'student_number' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'social_media' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
			'description' => EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY,
		),
		'save' => ''
	);

/**
 * Expect admin user can access edit action
 *
 * @return void
 */
	public function testEditGet() {
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		$this->testAction(
			'/edumap/visibilitySettings/edit/1',
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
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		$this->testAction(
			'/edumap/visibilitySettings/edit/2',
			array(
				'method' => 'get',
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
	public function testEditPost() {
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 1;
		$blockId = 1;

		//登録処理実行
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'EdumapVisibilitySetting' => array(
					'id' => '1',
					'edumap_key' => 'edumap_1',
				),
			)
		);

		$this->testAction(
			'/edumap/visibilitySettings/edit/' . $frameId,
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
		$this->_generateController('Edumap.VisibilitySettings');
		RolesControllerTest::login($this);

		//データ生成
		$frameId = 2;
		$blockId = 2;

		//登録処理実行
		$data = Hash::merge(
			$this->__saveDefault,
			array(
				'Frame' => array('id' => $frameId),
				'Block' => array('id' => $blockId),
				'EdumapVisibilitySetting' => array(
					'id' => '',
					'edumap_key' => 'edumap_2',
				),
			)
		);

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
