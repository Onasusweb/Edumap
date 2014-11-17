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
		
		//Edumap表示方法データを取得
		$EdumapVisibilityFrameSetting = $this->EdumapVisibilityFrameSetting->getEdumapVisibilityFrameSetting(
		);
		
		//データをviewにセット
		$this->set('edumap', $Edumap);
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
