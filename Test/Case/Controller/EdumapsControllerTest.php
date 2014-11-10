<?php
/**
 * EdumapsController Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapsController', 'Edumap.Controller');

/**
 * EdumapsController Test Case
 */
class EdumapsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'plugin.edumap.edumap',
		'plugin.edumap.site_setting',
		'plugin.edumap.site_setting_value'
	);

}
