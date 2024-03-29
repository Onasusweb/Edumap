<?php
/**
 * EdumapHelper Test Case
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('View', 'View');
App::uses('EdumapHelper', 'Edumap.View/Helper');

/**
 * Summary for EdumapHelper Test Case
 */
class EdumapHelperTest extends CakeTestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$View = new View();
		$this->Edumap = new EdumapHelper($View);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Edumap);
		parent::tearDown();
	}

/**
 * Test Edumap->getPrefectureText()
 *
 * @return void
 */
	public function testGetPrefectureText() {
		$checks = array(
			'00' => '',
			'01' => __d('edumap', 'Hokkaido'),
			'02' => __d('edumap', 'Aomori'),
			'03' => __d('edumap', 'Iwate'),
			'04' => __d('edumap', 'Miyagi'),
			'05' => __d('edumap', 'Akita'),
			'06' => __d('edumap', 'Yamagata'),
			'07' => __d('edumap', 'Fukushima'),
			'08' => __d('edumap', 'Ibaraki'),
			'09' => __d('edumap', 'Tochigi'),
			'10' => __d('edumap', 'Gunma'),
			'11' => __d('edumap', 'Saitama'),
			'12' => __d('edumap', 'Chiba'),
			'13' => __d('edumap', 'Tokyo'),
			'14' => __d('edumap', 'Kanagawa'),
			'15' => __d('edumap', 'Niigata'),
			'16' => __d('edumap', 'Toyama'),
			'17' => __d('edumap', 'Ishikawa'),
			'18' => __d('edumap', 'Fukui'),
			'19' => __d('edumap', 'Yamanashi'),
			'20' => __d('edumap', 'Nagano'),
			'21' => __d('edumap', 'Gifu'),
			'22' => __d('edumap', 'Shizuoka'),
			'23' => __d('edumap', 'Aichi'),
			'24' => __d('edumap', 'Mie'),
			'25' => __d('edumap', 'Shiga'),
			'26' => __d('edumap', 'Kyoto'),
			'27' => __d('edumap', 'Osaka'),
			'28' => __d('edumap', 'Hyogo'),
			'29' => __d('edumap', 'Nara'),
			'30' => __d('edumap', 'Wakayama'),
			'31' => __d('edumap', 'Tottori'),
			'32' => __d('edumap', 'Shimane'),
			'33' => __d('edumap', 'Okayama'),
			'34' => __d('edumap', 'Hiroshima'),
			'35' => __d('edumap', 'Yamaguchi'),
			'36' => __d('edumap', 'Tokushima'),
			'37' => __d('edumap', 'Kagawa'),
			'38' => __d('edumap', 'Ehime'),
			'39' => __d('edumap', 'Kochi'),
			'40' => __d('edumap', 'Fukuoka'),
			'41' => __d('edumap', 'Saga'),
			'42' => __d('edumap', 'Nagasaki'),
			'43' => __d('edumap', 'Kumamoto'),
			'44' => __d('edumap', 'Oita'),
			'45' => __d('edumap', 'Miyazaki'),
			'46' => __d('edumap', 'Kagoshima'),
			'47' => __d('edumap', 'Okinawa'),
			'48' => '',
		);

		foreach ($checks as $code => $text) {
			$this->assertTextEquals($text, $this->Edumap->getPrefectureText($code));
		}
	}

/**
 * Test Edumap->getGovernorTypeText()
 *
 * @return void
 */
	public function testGetGovernorTypeText() {
		$checks = array(
			'0' => '',
			'1' => __d('edumap', 'National'),
			'2' => __d('edumap', 'Prefectural'),
			'3' => __d('edumap', 'Public school'),
			'4' => __d('edumap', 'Municipal'),
			'5' => __d('edumap', 'By union'),
			'6' => __d('edumap', 'Private school'),
			'9' => __d('edumap', 'Other'),
		);

		foreach ($checks as $code => $text) {
			$this->assertTextEquals($text, $this->Edumap->getGovernorTypeText($code));
		}
	}

/**
 * Test Edumap->getEducationTypeText()
 *
 * @return void
 */
	public function testGetEducationTypeText() {
		$checks = array(
			'0' => '',
			'1' => __d('edumap', 'Elementary school'),
			'2' => __d('edumap', 'Middle school'),
			'3' => __d('edumap', 'High school'),
			'4' => __d('edumap', 'Middle and high consistency'),
			'9' => __d('edumap', 'Other'),
		);

		foreach ($checks as $code => $text) {
			$this->assertTextEquals($text, $this->Edumap->getEducationTypeText($code));
		}
	}

/**
 * Test Edumap->getCoeducationTypeText()
 *
 * @return void
 */
	public function testGetCoeducationTypeText() {
		$checks = array(
			'0' => '',
			'1' => __d('edumap', 'Coeducation school'),
			'2' => __d('edumap', 'Boy\'s school'),
			'3' => __d('edumap', 'Girl\'s school'),
			'9' => '',
		);

		foreach ($checks as $code => $text) {
			$this->assertTextEquals($text, $this->Edumap->getCoeducationTypeText($code));
		}
	}

/**
 * Test Edumap->getVisibilitySettingText()
 *
 * @return void
 */
	public function testGetVisibilitySettingText() {
		$checks = array(
			EdumapVisibilitySetting::PRIVATE_VISIBILITY => __d('edumap', 'No display'),
			EdumapVisibilitySetting::PUBLIC_VISIBILITY => __d('edumap', 'Display'),
			EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY => __d('edumap', 'Display only school officials in edumap on'),
			'9' => '',
		);

		foreach ($checks as $code => $text) {
			$this->assertTextEquals($text, $this->Edumap->getVisibilitySettingText($code));
		}
	}

}
