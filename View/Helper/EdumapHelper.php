<?php
/**
 * EdumapHelper
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppHelper', 'View/Helper');

/**
 * EdumapHelper
 * 
 * @SuppressWarnings(PHPMD.ExcessiveClassComplexity)
 */
class EdumapHelper extends AppHelper {

/**
 * Get prefecture name
 *
 * @param string $prefectureCode Prefecture code
 * @return string Prefecture name
 * @SuppressWarnings(PHPMD.CyclomaticComplexity)
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
	public function getPrefectureText($prefectureCode) {
		//都道府県名を取得
		switch($prefectureCode) {
			case '01':
				return __d('edumap', 'Hokkaido');
			case '02':
				return __d('edumap', 'Aomori');
			case '03':
				return __d('edumap', 'Iwate');
			case '04':
				return __d('edumap', 'Miyagi');
			case '05':
				return __d('edumap', 'Akita');
			case '06':
				return __d('edumap', 'Yamagata');
			case '07':
				return __d('edumap', 'Fukushima');
			case '08':
				return __d('edumap', 'Ibaraki');
			case '09':
				return __d('edumap', 'Tochigi');
			case '10':
				return __d('edumap', 'Gunma');
			case '11':
				return __d('edumap', 'Saitama');
			case '12':
				return __d('edumap', 'Chiba');
			case '13':
				return __d('edumap', 'Tokyo');
			case '14':
				return __d('edumap', 'Kanagawa');
			case '15':
				return __d('edumap', 'Niigata');
			case '16':
				return __d('edumap', 'Toyama');
			case '17':
				return __d('edumap', 'Ishikawa');
			case '18':
				return __d('edumap', 'Fukui');
			case '19':
				return __d('edumap', 'Yamanashi');
			case '20':
				return __d('edumap', 'Nagano');
			case '21':
				return __d('edumap', 'Gifu');
			case '22':
				return __d('edumap', 'Shizuoka');
			case '23':
				return __d('edumap', 'Aichi');
			case '24':
				return __d('edumap', 'Mie');
			case '25':
				return __d('edumap', 'Shiga');
			case '26':
				return __d('edumap', 'Kyoto');
			case '27':
				return __d('edumap', 'Osaka');
			case '28':
				return __d('edumap', 'Hyogo');
			case '29':
				return __d('edumap', 'Nara');
			case '30':
				return __d('edumap', 'Wakayama');
			case '31':
				return __d('edumap', 'Tottori');
			case '32':
				return __d('edumap', 'Shimane');
			case '33':
				return __d('edumap', 'Okayama');
			case '34':
				return __d('edumap', 'Hiroshima');
			case '35':
				return __d('edumap', 'Yamaguchi');
			case '36':
				return __d('edumap', 'Tokushima');
			case '37':
				return __d('edumap', 'Kagawa');
			case '38':
				return __d('edumap', 'Ehime');
			case '39':
				return __d('edumap', 'Kochi');
			case '40':
				return __d('edumap', 'Fukuoka');
			case '41':
				return __d('edumap', 'Saga');
			case '42':
				return __d('edumap', 'Nagasaki');
			case '43':
				return __d('edumap', 'Kumamoto');
			case '44':
				return __d('edumap', 'Oita');
			case '45':
				return __d('edumap', 'Miyazaki');
			case '46':
				return __d('edumap', 'Kagoshima');
			case '47':
				return __d('edumap', 'Okinawa');
			default:
				return '';
		}
	}

/**
 * Get governor type name
 *
 * @param string $governorType Governor type
 * @return string Prefecture name
 */
	public function getGovernorTypeText($governorType) {
		//国公立私立区分を取得
		switch($governorType) {
			case '1':
				return __d('edumap', 'National');
			case '2':
				return __d('edumap', 'Prefectural');
			case '3':
				return __d('edumap', 'Public school');
			case '4':
				return __d('edumap', 'Municipal');
			case '5':
				return __d('edumap', 'By union');
			case '6':
				return __d('edumap', 'Private school');
			case '9':
				return __d('edumap', 'Other');
			default:
				return '';
		}
	}

/**
 * Get education type name
 *
 * @param string $educationType Education type
 * @return string Prefecture name
 */
	public function getEducationTypeText($educationType) {
		//校種を取得
		switch($educationType) {
			case '1':
				return __d('edumap', 'Elementary school');
			case '2':
				return __d('edumap', 'Middle school');
			case '3':
				return __d('edumap', 'High school');
			case '4':
				return __d('edumap', 'Middle and high consistency');
			case '9':
				return __d('edumap', 'Other');
			default:
				return '';
		}
	}

/**
 * Get coeducation type name
 *
 * @param string $coeducationType Coeducation type
 * @return string Prefecture name
 */
	public function getCoeducationTypeText($coeducationType) {
		//共学・別学を取得
		switch($coeducationType) {
			case '1':
				return __d('edumap', 'Coeducation school');
			case '2':
				return __d('edumap', 'Boy\'s school');
			case '3':
				return __d('edumap', 'Girl\'s school');
			default:
				return '';
		}
	}

/**
 * Get coeducation type name
 *
 * @param string $value Coeducation type
 * @return string Prefecture name
 */
	public function getVisibilitySettingText($value) {
		//公開・非公開・edumap上の学校関係者のみ公開を取得
		switch($value) {
			case EdumapVisibilitySetting::PRIVATE_VISIBILITY:
				return __d('edumap', 'No display');
			case EdumapVisibilitySetting::PUBLIC_VISIBILITY:
				return __d('edumap', 'Display');
			case EdumapVisibilitySetting::PUBLIC_ON_EDUMAP_VISIBILITY:
				return __d('edumap', 'Display only school officials in edumap on');
			default:
				return '';
		}
	}

}
