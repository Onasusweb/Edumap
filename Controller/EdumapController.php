<?php
/**
 * Edumap Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapAppController', 'Edumap.Controller');


/**
 * Edumap Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Controller
 */
class EdumapController extends EdumapAppController {


/**
 * use model
 *
 * @var array
 */
	public $uses = array(
		'Edumap.Edumap',
		'Edumap.EdumapStudent',
		'Edumap.EdumapSocialMedium',
		'Edumap.EdumapVisibilityFrameSetting',
	);


/**
 * use component
 *
 * @var array
 */
	//public $components = array();
	public $components = array(
		'NetCommons.NetCommonsBlock', //use Announcement model or view
		'NetCommons.NetCommonsFrame',
		'NetCommons.NetCommonsRoomRole',
	);


/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();

		$frameId = (isset($this->params['pass'][0]) ? (int)$this->params['pass'][0] : 0);
		//Frameのデータをviewにセット
		if (! $this->NetCommonsFrame->setView($this, $frameId)) {
			throw new ForbiddenException('NetCommonsFrame');
		}
		//Roleのデータをviewにセット
		if (! $this->NetCommonsRoomRole->setView($this)) {
			throw new ForbiddenException('NetCommonsRoomRole');
		}

	}

	public function index($frameId = 0) {
		return $this->view($frameId);
	}

	public function view($frameId = 0, $lang = '') {
		//Edumapデータを取得
		$Edumap = $this->Edumap->getEdumap(
				$this->viewVars['blockId'],
				$this->viewVars['contentEditable']
			);

		//都道府県名を取得
		if(isset($Edumap['Edumap']['prefecture_code'])) {
		switch($Edumap['Edumap']['prefecture_code']) {
			case '1':
				$Selected['prefecture'] = __d('edumap', 'Hokkaido');
				break;
			case '2':
				$Selected['prefecture'] = __d('edumap', 'Aomori');
				break;
			case '3':
				$Selected['prefecture'] = __d('edumap', 'Iwate');
				break;
			case '4':
				$Selected['prefecture'] = __d('edumap', 'Miyagi');
				break;
			case '5':
				$Selected['prefecture'] = __d('edumap', 'Akita');
				break;
			case '6':
				$Selected['prefecture'] = __d('edumap', 'Yamagata');
				break;
			case '7':
				$Selected['prefecture'] = __d('edumap', 'Fukushima');
				break;
			case '8':
				$Selected['prefecture'] = __d('edumap', 'Ibaraki');
				break;
			case '9':
				$Selected['prefecture'] = __d('edumap', 'Tochigi');
				break;
			case '10':
				$Selected['prefecture'] = __d('edumap', 'Gunma');
				break;
			case '11':
				$Selected['prefecture'] = __d('edumap', 'Saitama');
				break;
			case '12':
				$Selected['prefecture'] = __d('edumap', 'Chiba');
				break;
			case '13':
				$Selected['prefecture'] = __d('edumap', 'Tokyo');
				break;
			case '14':
				$Selected['prefecture'] = __d('edumap', 'Kanagawa');
				break;
			case '15':
				$Selected['prefecture'] = __d('edumap', 'Niigata');
				break;
			case '16':
				$Selected['prefecture'] = __d('edumap', 'Toyama');
				break;
			case '17':
				$Selected['prefecture'] = __d('edumap', 'Ishikawa');
				break;
			case '18':
				$Selected['prefecture'] = __d('edumap', 'Fukui');
				break;
			case '19':
				$Selected['prefecture'] = __d('edumap', 'Yamanashi');
				break;
			case '20':
				$Selected['prefecture'] = __d('edumap', 'Nagano');
				break;
			case '21':
				$Selected['prefecture'] = __d('edumap', 'Gifu');
				break;
			case '22':
				$Selected['prefecture'] = __d('edumap', 'Shizuoka');
				break;
			case '23':
				$Selected['prefecture'] = __d('edumap', 'Aichi');
				break;
			case '24':
				$Selected['prefecture'] = __d('edumap', 'Mie');
				break;
			case '25':
				$Selected['prefecture'] = __d('edumap', 'Shiga');
				break;
			case '26':
				$Selected['prefecture'] = __d('edumap', 'Kyoto');
				break;
			case '27':
				$Selected['prefecture'] = __d('edumap', 'Osaka');
				break;
			case '28':
				$Selected['prefecture'] =__d('edumap', 'Hyogo');
				break;
			case '29':
				$Selected['prefecture'] = __d('edumap', 'Nara');
				break;
			case '30':
				$Selected['prefecture'] = __d('edumap', 'Wakayama');
				break;
			case '31':
				$Selected['prefecture'] = __d('edumap', 'Tottori');
				break;
			case '32':
				$Selected['prefecture'] = __d('edumap', 'Shimane');
				break;
			case '33':
				$Selected['prefecture'] = __d('edumap', 'Okayama');
				break;
			case '34':
				$Selected['prefecture'] = __d('edumap', 'Hiroshima');
				break;
			case '35':
				$Selected['prefecture'] = __d('edumap', 'Yamaguchi');
				break;
			case '36':
				$Selected['prefecture'] = __d('edumap', 'Tokushima');
				break;
			case '37':
				$Selected['prefecture'] = __d('edumap', 'Kagawa');
				break;
			case '38':
				$Selected['prefecture'] = __d('edumap', 'Ehime');
				break;
			case '39':
				$Selected['prefecture'] = __d('edumap', 'Kochi');
				break;
			case '40':
				$Selected['prefecture'] = __d('edumap', 'Fukuoka');
				break;
			case '41':
				$Selected['prefecture'] = __d('edumap', 'Saga');
				break;
			case '42':
				$Selected['prefecture'] = __d('edumap', 'Nagasaki');
				break;
			case '43':
				$Selected['prefecture'] = __d('edumap', 'Kumamoto');
				break;
			case '44':
				$Selected['prefecture'] = __d('edumap', 'Oita');
				break;
			case '45':
				$Selected['prefecture'] = __d('edumap', 'Miyazaki');
				break;
			case '46':
				$Selected['prefecture'] = __d('edumap', 'Kagoshima');
				break;
			case '47':
				$Selected['prefecture'] = __d('edumap', 'Okinawa');
				break;
			default:
				$Selected['prefecture'] = '';
		}
		}

		if(isset($Edumap['Edumap']['governor_type'])) {
		//国公立私立区分を取得
		switch($Edumap['Edumap']['governor_type']) {
			case '1':
				$Selected['governor_type'] = __d('edumap', 'National');;
				break;
			case '2':
				$Selected['governor_type'] =__d('edumap', 'Prefectural');
				break;
			case '3':
				$Selected['governor_type'] = __d('edumap', 'Public school');
				break;
			case '4':
				$Selected['governor_type'] = __d('edumap', 'Municipal');
				break;
			case '5':
				$Selected['governor_type'] = __d('edumap', 'By union');
				break;
			case '6':
				$Selected['governor_type'] = __d('edumap', 'Private school');
				break;
			case '9':
				$Selected['governor_type'] = __d('edumap', 'Other');
				break;
			case '0':
				$Selected['governor_type'] = __d('edumap', 'Not set');
				break;
			default:
				$Selected['governor_type'] = '';
				break;
		}
		}

		if(isset($Edumap['Edumap']['education_type'])) {
		//校種を取得
		switch($Edumap['Edumap']['education_type']) {
			case '1':
				$Selected['education_type'] = __d('edumap', 'Elementary school');
				break;
			case '2':
				$Selected['education_type'] = __d('edumap', 'Middle school');
				break;
			case '3':
				$Selected['education_type'] = __d('edumap', 'High Schools');
				break;
			case '4':
				$Selected['education_type'] = __d('edumap', 'Middle and high consistency');
				break;
			case '9':
				$Selected['education_type'] = __d('edumap', 'Other');
				break;
			case '0':
				$Selected['education_type'] = __d('edumap', 'Not set');
				break;
			default:
				$Selected['education_type'] = '';
				break;
		}
		}

		if(isset($Edumap['Edumap']['coeducation_type'])) {
		//共学・別学を取得
		switch($Edumap['Edumap']['coeducation_type']) {
			case '1':
				$Selected['coeducation_type'] = __d('edumap', 'Coeducation school');
				break;
			case '2':
				$Selected['coeducation_type'] = __d('edumap', 'Boys school');
				break;
			case '3':
				$Selected['coeducation_type'] = __d('edumap', 'Girls school');
				break;
			case '0':
				$Selected['coeducation_type'] = __d('edumap', 'Not set');
				break;
			default:
				$Selected['coeducation_type'] = '';
				break;
		}
		}

		$EdumapStudent = $this->EdumapStudent->getEdumapStudent(
				$Edumap['Edumap']['key']
			);
		
		//edumap_social_mediaデータを取得
		$EdumapSocialMedium = $this->EdumapSocialMedium->getEdumapSocialMedium(
				$Edumap['Edumap']['key']
		);

		//Edumap表示方法データを取得
		$EdumapVisibilityFrameSetting = $this->EdumapVisibilityFrameSetting->getEdumapVisibilityFrameSetting(
		);
		
		//データをviewにセット
		$this->set('edumap', $Edumap);
		if(isset( $Selected)) {
			$this->set('edumap_selected', $Selected);
		}
		$this->set('edumap_student', $EdumapStudent);
		$this->set('edumap_social_media', $EdumapSocialMedium);
		$this->set('edumap_visibility_frame_setting', $EdumapVisibilityFrameSetting);

		return $this->render('Edumap/view');
	}

}
