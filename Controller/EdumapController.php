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
		'Edumap.EdumapVisibilitySetting',
		'Comments.Comment',
		'Files.FileModel',
	);

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'NetCommons.NetCommonsBlock',
		'NetCommons.NetCommonsFrame',
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
		'Edumap.Edumap'
	);

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->view = 'Edumap/view';
		$this->view();
	}

/**
 * view method
 *
 * @return void
 */
	public function view() {
		//Edumapデータを取得
		$this->__initEdumap();

		if ($this->request->is('ajax')) {
			$tokenFields = Hash::flatten($this->request->data);
			$hiddenFields = array(
				'Edumap.block_id',
				'Edumap.key'
			);
			$this->set('tokenFields', $tokenFields);
			$this->set('hiddenFields', $hiddenFields);
			$this->renderJson();
		} else {
			if ($this->viewVars['contentEditable']) {
				$this->view = 'Edumap/viewForEditor';
			}
		}
	}

/**
 * edit method
 *
 * @throws BadRequestException
 * @return void
 */
	public function edit() {
		$this->__initEdumap();

		if ($this->request->isGet()) {
			CakeSession::write('backUrl', $this->request->referer());
		}

		if ($this->request->isPost()) {
			if (!$status = $this->__parseStatus()) {
				return;
			}

			$data = Hash::merge(
				$this->__parseRequestData(),
				['Edumap' => ['status' => $status]]
			);

			//最新データ取得
			if (! $edumap = $this->Edumap->getEdumap(
				(int)$data['Frame']['id'],
				isset($data['Block']['id']) ? (int)$data['Block']['id'] : null,
				true
			)) {
				$edumap = $this->Edumap->create(['key' => Security::hash($this->Edumap->name . mt_rand() . microtime(), 'md5')]);

				$visibilitySetting = $this->EdumapVisibilitySetting->create(['edumap_key' => $edumap['Edumap']['key']]);
				$data = Hash::merge($data, $visibilitySetting);
			}
			$data = Hash::merge($edumap, $data);

			//登録処理
			$edumap = $this->Edumap->saveEdumap($data);

			//エラーチェック＆出力
			if (! $this->__handleValidationError($this->Edumap->validationErrors)) {
				$data['Edumap']['foundation_date'] = $this->data['Edumap']['foundation_date'];
				$data['Edumap']['closed_date'] = $this->data['Edumap']['closed_date'];
				$results = $this->camelizeKeyRecursive($data);
				$this->set($results);
				return;
			}
			$this->set('blockId', $edumap['Edumap']['block_id']);

			if (! $this->request->is('ajax')) {
				$backUrl = CakeSession::read('backUrl');
				CakeSession::delete('backUrl');
				$this->redirect($backUrl);
			}
			return;
		}
	}

/**
 * __initEdumap method
 *
 * @return void
 */
	private function __initEdumap() {
		//edumapデータ基本情報
		if (! $edumap = $this->Edumap->getEdumap(
			$this->viewVars['frameId'],
			$this->viewVars['blockId'],
			$this->viewVars['contentEditable']
		)) {
			$edumap = $this->Edumap->create(['id' => null, 'key' => null, 'file_id' => null]);
		}
		//公開設定
		if (! $visibilitySetting = $this->EdumapVisibilitySetting->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'edumap_key' => $edumap['Edumap']['key']
			)
		))) {
			$visibilitySetting = $this->EdumapVisibilitySetting->create();
		}
		//アバター取得
		$avatar = $this->FileModel->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				$this->FileModel->alias . '.id' => $edumap['Edumap']['file_id']
			)
		));
		//生徒数取得
		$edumapStudents = $this->EdumapStudent->find('list', array(
			'fields' => array('gendar', 'number', 'grade'),
			'recursive' => -1,
			'conditions' => array(
				'edumap_id' => $edumap['Edumap']['id']
			)
		));
		//SNS取得
		$edumapSocialMedia = $this->EdumapSocialMedium->find('list', array(
			'fields' => array('type', 'value'),
			'recursive' => -1,
			'conditions' => array(
				'edumap_id' => $edumap['Edumap']['id']
			)
		));
		//コメント
		$comments = $this->Comment->getComments(
			array(
				'plugin_key' => 'edumap',
				'content_key' => $edumap['Edumap']['key']
			)
		);

		$results = Hash::merge(
			$edumap,
			$visibilitySetting,
			$avatar,
			array(
				'edumapStudents' => $edumapStudents,
				'edumapSocialMedium' => $edumapSocialMedia,
				'comments' => $comments,
				'contentStatus' => $edumap['Edumap']['status']
			)
		);
		$results = $this->camelizeKeyRecursive($results);
		$this->set($results);
	}

/**
 * Parse content status from request
 *
 * @return mixed status on success, false on error
 * @throws BadRequestException
 */
	private function __parseStatus() {
		if ($matches = preg_grep('/^save_\d/', array_keys($this->data))) {
			list(, $status) = explode('_', array_shift($matches));
		} else {
			if ($this->request->is('ajax')) {
				$this->renderJson(
					['error' => ['validationErrors' => ['status' => __d('net_commons', 'Invalid request.')]]],
					__d('net_commons', 'Bad Request'), 400
				);
			} else {
				throw new BadRequestException(__d('net_commons', 'Bad Request'));
			}
			return false;
		}

		return $status;
	}

/**
 * Parse data from request
 *
 * @return array
 */
	private function __parseRequestData() {
		$data = $this->data;

		//アバター
		$data[Edumap::AVATAR_INPUT]['File'] = $this->FileUpload->upload($this, $this->Edumap->alias, Edumap::AVATAR_INPUT);
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

/**
 * Handle validation error
 *
 * @param array $errors validation errors
 * @return bool true on success, false on error
 */
	private function __handleValidationError($errors) {
		if ($errors) {
			$this->validationErrors = $errors;
			if ($this->request->is('ajax')) {
				$results = ['error' => ['validationErrors' => $errors]];
				$this->renderJson($results, __d('net_commons', 'Bad Request'), 400);
			}
			return false;
		}

		return true;
	}

}
