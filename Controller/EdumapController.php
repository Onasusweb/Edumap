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
 * use models
 *
 * @var array
 */
	public $uses = array(
		'Edumap.EdumapStudent',
		'Edumap.EdumapSocialMedium',
		'Edumap.EdumapVisibilitySetting',
		'Comments.Comment',
		'Files.FileModel',
	);

/**
 * use components
 *
 * @var array
 */
	public $components = array(
		'NetCommons.NetCommonsWorkflow',
		'NetCommons.NetCommonsRoomRole' => array(
			//コンテンツの権限設定
			'allowedActions' => array(
				'contentEditable' => array('edit')
			),
		),
		'Files.FileUpload',
	);

/**
 * use helpers
 *
 * @var array
 */
	public $helpers = array(
		'Edumap.Edumap',
		'NetCommons.Token'
	);

/**
 * view
 *
 * @return void
 */
	public function view() {
		//Edumapデータを取得
		$this->__initEdumap();

		if ($this->request->is('ajax')) {
			//$results = array(
			//	$this->viewVars['edumap'],
			//	$this->viewVars['file'],
			//	$this->viewVars['edumapStudents'],
			//	$this->viewVars['edumapSocialMedia'],
			//);
			//$this->renderJson($results);
		}
	}

/**
 * edit
 *
 * @throws BadRequestException
 * @return void
 */
	public function edit() {
		//Edumapデータを取得
		$this->__initEdumap();

		//コメントデータ取得
		$comments = $this->Comment->getComments(
			array(
				'plugin_key' => $this->params['plugin'],
				'content_key' => $this->viewVars['edumap']['key']
			)
		);

		$data = array();
		if ($this->request->isPost()) {
			if (! $status = $this->NetCommonsWorkflow->parseStatus()) {
				return;
			}

			$data = $this->__parseRequestData();
			$data = Hash::merge($data, array(
				'Edumap' => array('status' => $status)
			));
			unset($data['Edumap']['id']);

			if (! $this->viewVars['blockId']) {
				$visibilitySetting = $this->EdumapVisibilitySetting->create();
				$data = Hash::merge($data, $visibilitySetting);
			}

			//登録処理
			$this->Edumap->saveEdumap($data);
			if ($this->NetCommons->handleValidationError($this->Edumap->validationErrors)) {
				//正常の場合
				$this->redirect(NetCommonsUrl::backToPageUrl());
				return;
			}
			$data['Edumap']['foundation_date'] = $this->data['Edumap']['foundation_date'];
			$data['Edumap']['closed_date'] = $this->data['Edumap']['closed_date'];
			$data['contentStatus'] = null;
			$data['comments'] = null;
			unset($data['Edumap']['status']);
		}

		$data = $this->camelizeKeyRecursive(Hash::merge(
			$data,
			array(
				'comments' => $comments,
				'contentStatus' => $this->viewVars['edumap']['status']
			)
		));
		$results = Hash::merge($this->viewVars, $data);
		$this->set($results);
	}

/**
 * __initEdumap
 *
 * @return void
 */
	private function __initEdumap() {
		//edumapデータ基本情報
		if ($this->viewVars['blockId']) {
			$this->initEdumap(['edumapVisibilitySetting']);
		} else {
			$edumap = $this->Edumap->create(array(
				'id' => null,
				'key' => null,
				'file_id' => null,
				'status' => null,
				'name' => ''
			));
			$results = $this->camelizeKeyRecursive($edumap);
			$this->set($results);
		}
		//アバター取得
		$file = $this->FileModel->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				$this->FileModel->alias . '.id' => $this->viewVars['edumap']['fileId']
			)
		));
		//生徒数取得
		$edumapStudents = $this->EdumapStudent->find('list', array(
			'fields' => array('gendar', 'number', 'grade'),
			'recursive' => -1,
			'conditions' => array(
				'edumap_id' => $this->viewVars['edumap']['id']
			)
		));
		//SNS取得
		$edumapSocialMedia = $this->EdumapSocialMedium->find('list', array(
			'fields' => array('type', 'value'),
			'recursive' => -1,
			'conditions' => array(
				'edumap_id' => $this->viewVars['edumap']['id']
			)
		));

		//Viewにセット
		$results = $this->camelizeKeyRecursive(Hash::merge(
			$file,
			array(
				'edumapStudents' => $edumapStudents,
				'edumapSocialMedia' => $edumapSocialMedia
			)
		));
		$this->set($results);
	}

/**
 * Parse data from request
 *
 * @return array
 */
	private function __parseRequestData() {
		$data = $this->data;

		//アバター
		$data[Edumap::AVATAR_INPUT]['File'] = $this->FileUpload->upload($this->Edumap->alias, Edumap::AVATAR_INPUT);
		if (! $data[Edumap::AVATAR_INPUT]['File']) {
			unset($data[Edumap::AVATAR_INPUT]);
		}

		//開校日
		if ($matches = preg_grep('/^\d+$/', array_values($this->data['Edumap']['foundation_date']))) {
			$data['Edumap']['foundation_date'] = implode(Edumap::DATE_SEPARATOR, $matches);
		} else {
			$data['Edumap']['foundation_date'] = '';
		}
		//閉校日
		if ($matches = preg_grep('/^\d+$/', array_values($this->data['Edumap']['closed_date']))) {
			$data['Edumap']['closed_date'] = implode(Edumap::DATE_SEPARATOR, $matches);
		} else {
			$data['Edumap']['closed_date'] = '';
		}
		//生徒数
		foreach ($data['EdumapStudent'] as $i => $student) {
			if (! is_numeric($student['number'])) {
				unset($data['EdumapStudent'][$i]);
			}
		}
		//SNS
		foreach ($data['EdumapSocialMedium'] as $i => $sns) {
			if (! $sns['value']) {
				unset($data['EdumapSocialMedium'][$i]);
			}
		}

		return $data;
	}
}
