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
		switch($Edumap['Edumap']['prefecture_code']) {
			case '1':
				$Selected['prefecture'] = '北海道';
				break;
			case '2':
				$Selected['prefecture'] = '青森県';
				break;
			case '3':
				$Selected['prefecture'] = '岩手県';
				break;
			case '4':
				$Selected['prefecture'] = '宮城県';
				break;
			case '5':
				$Selected['prefecture'] = '秋田県';
				break;
			case '6':
				$Selected['prefecture'] = '山形県';
				break;
			case '7':
				$Selected['prefecture'] = '福島県';
				break;
			case '8':
				$Selected['prefecture'] = '茨城県';
				break;
			case '9':
				$Selected['prefecture'] = '栃木県';
				break;
			case '10':
				$Selected['prefecture'] = '群馬県';
				break;
			case '11':
				$Selected['prefecture'] = '埼玉県';
				break;
			case '12':
				$Selected['prefecture'] = '千葉県';
				break;
			case '13':
				$Selected['prefecture'] = '東京都';
				break;
			case '14':
				$Selected['prefecture'] = '神奈川県';
				break;
			case '15':
				$Selected['prefecture'] = '新潟県';
				break;
			case '16':
				$Selected['prefecture'] = '富山県';
				break;
			case '17':
				$Selected['prefecture'] = '石川県';
				break;
			case '18':
				$Selected['prefecture'] = '福井県';
				break;
			case '19':
				$Selected['prefecture'] = '山梨県';
				break;
			case '20':
				$Selected['prefecture'] = '長野県';
				break;
			case '21':
				$Selected['prefecture'] = '岐阜県';
				break;
			case '22':
				$Selected['prefecture'] = '静岡県';
				break;
			case '23':
				$Selected['prefecture'] = '愛知県';
				break;
			case '24':
				$Selected['prefecture'] = '三重県';
				break;
			case '25':
				$Selected['prefecture'] = '滋賀県';
				break;
			case '26':
				$Selected['prefecture'] = '京都府';
				break;
			case '27':
				$Selected['prefecture'] = '大阪府';
				break;
			case '28':
				$Selected['prefecture'] = '兵庫県';
				break;
			case '29':
				$Selected['prefecture'] = '奈良県';
				break;
			case '30':
				$Selected['prefecture'] = '和歌山県';
				break;
			case '31':
				$Selected['prefecture'] = '鳥取県';
				break;
			case '32':
				$Selected['prefecture'] = '島根県';
				break;
			case '33':
				$Selected['prefecture'] = '岡山県';
				break;
			case '34':
				$Selected['prefecture'] = '広島県';
				break;
			case '35':
				$Selected['prefecture'] = '山口県';
				break;
			case '36':
				$Selected['prefecture'] = '徳島県';
				break;
			case '37':
				$Selected['prefecture'] = '香川県';
				break;
			case '38':
				$Selected['prefecture'] = '愛媛県';
				break;
			case '39':
				$Selected['prefecture'] = '高知県';
				break;
			case '40':
				$Selected['prefecture'] = '福岡県';
				break;
			case '41':
				$Selected['prefecture'] = '佐賀県';
				break;
			case '42':
				$Selected['prefecture'] = '長崎県';
				break;
			case '43':
				$Selected['prefecture'] = '熊本県';
				break;
			case '44':
				$Selected['prefecture'] = '大分県';
				break;
			case '45':
				$Selected['prefecture'] = '宮崎県';
				break;
			case '46':
				$Selected['prefecture'] = '鹿児島県';
				break;
			case '47':
				$Selected['prefecture'] = '沖縄県';
				break;
			default:
				$Selected['prefecture'] = '';
		}

		//国公立私立区分を取得
		switch($Edumap['Edumap']['governor_type']) {
			case '1':
				$Selected['governor_type'] = '国立';
				break;
			case '2':
				$Selected['governor_type'] = '県立';
				break;
			case '3':
				$Selected['governor_type'] = '公立';
				break;
			case '4':
				$Selected['governor_type'] = '市立';
				break;
			case '5':
				$Selected['governor_type'] = '組合立';
				break;
			case '6':
				$Selected['governor_type'] = '私立';
				break;
			case '9':
				$Selected['governor_type'] = 'その他';
				break;
			case '0':
				$Selected['governor_type'] = '未設定';
				break;
			default:
				$Selected['governor_type'] = '';
				break;
		}

		//校種を取得
		switch($Edumap['Edumap']['education_type']) {
			case '1':
				$Selected['education_type'] = '小学校';
				break;
			case '2':
				$Selected['education_type'] = '中学校';
				break;
			case '3':
				$Selected['education_type'] = '高等教育';
				break;
			case '4':
				$Selected['education_type'] = '中等教育学校';
				break;
			case '9':
				$Selected['education_type'] = 'その他';
				break;
			case '0':
				$Selected['education_type'] = '未設定';
				break;
			default:
				$Selected['education_type'] = '';
				break;
		}

		//共学・別学を取得
		switch($Edumap['Edumap']['coeducation_type']) {
			case '1':
				$Selected['coeducation_type'] = '共学';
				break;
			case '2':
				$Selected['coeducation_type'] = '男子校';
				break;
			case '3':
				$Selected['coeducation_type'] = '女子校';
				break;
			case '0':
				$Selected['coeducation_type'] = '未設定';
				break;
			default:
				$Selected['coeducation_type'] = '';
				break;
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
		$this->set('edumap_selected', $Selected);
		$this->set('edumap_student', $EdumapStudent);
		$this->set('edumap_social_media', $EdumapSocialMedium);
		$this->set('edumap_visibility_frame_setting', $EdumapVisibilityFrameSetting);

		return $this->render('Edumap/view');
	}

	public function form($frameId = 0, $languageId = 0) {
		return $this->render('Edumap/form');
	}

	public function edit($frameId = 0) {
		return;
	}
}
