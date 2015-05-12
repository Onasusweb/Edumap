<?php
/**
 * Test of EdumapController->index()
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapController', 'Edumap.Controller');
App::uses('EdumapBaseController', 'Edumap.Test/Case/Controller');

/**
 * Test of EdumapController->index()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Controller
 */
class EdumapControllerTestIndex extends EdumapBaseController {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		$this->generate(
			'Edumap.Edumap',
			[
				'components' => [
					'Auth' => ['user'],
					'Session',
					'Security',
				]
			]
		);
		parent::setUp();
	}

/**
 * Expect visitor can access index action
 *
 * @return void
 */
	public function testIndex() {
		$this->testAction(
			'/edumap/edumap/index/121',
			array(
				'method' => 'get',
				'return' => 'view',
			)
		);

		$this->assertTextEquals('view', $this->controller->view);
	}

}
