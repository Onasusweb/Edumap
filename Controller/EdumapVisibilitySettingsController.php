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
class EdumapVisibilitySettingsController extends EdumapAppController {

/**
 * use model
 *
 * @var array
 */
	public $uses = array(
		'Edumap.Edumap',
		'Edumap.EdumapVisibilitySetting',
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
				'contentPublishable' => array('edit')
			),
		),
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
 * edit method
 *
 * @return void
 */
	public function edit() {
		$this->__initEdumapVisibilitySetting();
		if ($this->request->isGet()) {
			CakeSession::write('backUrl', $this->request->referer());
		}

		if ($this->request->isPost()) {
			$this->EdumapVisibilitySetting->saveEdumapVisibilitySetting($this->data);
			if (! $this->__handleValidationError($this->EdumapVisibilitySetting->validationErrors)) {
				return;
			}
			if (!$this->request->is('ajax')) {
				$backUrl = CakeSession::read('backUrl');
				CakeSession::delete('backUrl');
				$this->redirect($backUrl);
			}
			return;
		}
	}

/**
 * __initEdumapVisibilitySetting method
 *
 * @return void
 * @throws BadRequestException
 */
	private function __initEdumapVisibilitySetting() {
		if (! $edumap = $this->Edumap->getEdumap(
			$this->viewVars['frameId'],
			$this->viewVars['blockId'],
			$this->viewVars['contentEditable']
		)) {
			if ($this->request->is('ajax')) {
				$this->renderJson(
					['error' => ['validationErrors' => ['id' => __d('net_commons', 'Invalid request.')]]],
					__d('net_commons', 'Bad Request'), 400
				);
				return;
			} else {
				throw new BadRequestException(__d('net_commons', 'Bad Request'));
			}
		};

		if (! $visibilitySetting = $this->EdumapVisibilitySetting->find('first', array(
			'recursive' => -1,
			'conditions' => array(
				'edumap_key' => $edumap['Edumap']['key']
			)
		))) {
			$visibilitySetting = $this->EdumapVisibilitySetting->create(
				['edumap_key' => $edumap['Edumap']['key']]
			);
		}

		$results = $this->camelizeKeyRecursive($visibilitySetting);
		$this->set($results);
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
