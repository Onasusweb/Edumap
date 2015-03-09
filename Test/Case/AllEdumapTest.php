<?php
/**
 * Edumap All Test Suite
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

/**
 * Edumap All Test Suite
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case
 * @codeCoverageIgnore
 */
class AllEdumapTest extends CakeTestSuite {

/**
 * All test suite
 *
 * @return CakeTestSuite
 */
	public static function suite() {
		$plugin = preg_replace('/^All([\w]+)Test$/', '$1', __CLASS__);
		$suite = new CakeTestSuite(sprintf('All %s Plugin tests', $plugin));
//		$suite->addTestDirectoryRecursive(CakePlugin::path($plugin) . 'Test' . DS . 'Case' . DS . 'Model');
//		$suite->addTestDirectoryRecursive(CakePlugin::path($plugin) . 'Test' . DS . 'Case' . DS . 'Controller');
		$suite->addTestDirectoryRecursive(CakePlugin::path($plugin) . 'Test' . DS . 'Case');

//		$task = 'EdumapVisibilitySettingsController';
//var_dump(CakePlugin::path($plugin) . 'Test' . DS . 'Case' . DS . 'Controller' . DS . $task . 'Test.php');
//
//		$suite->addTestFile(CakePlugin::path($plugin) . 'Test' . DS . 'Case' . DS . 'Controller' . DS . $task . 'Test.php');

		return $suite;
	}
}
