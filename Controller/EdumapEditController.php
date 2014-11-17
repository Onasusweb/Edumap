<?php

App::uses('EdumapAppController', 'Edumap.Controller');

class EdumapEditController extends EdumapAppController {

	public $uses = array(
		'Edumap.Edumap',
		'Edumap.EdumapStudent',
		'Edumap.EdumapVisibilityFrameSetting',
	);

	public $components = array(
		'NetCommons.NetCommonsBlock',
		'NetCommons.NetCommonsFrame',
		'NetCommons.NetCommonsRoomRole',
	);


	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow();

		//Roleのデータをviewにセット
		if (! $this->NetCommonsRoomRole->setView($this)) {
			throw new ForbiddenException();
		}

		//編集権限チェック
		if (! $this->viewVars['contentEditable']) {
			throw new ForbiddenException();
		}
		
		//$this->Security->validatePost = false;
	}

	public function index($frameId = 0) {
		return $this->view($frameId);
	}

	public function view($frameId = 0) {
		//Frameのデータをviewにセット
		if (! $this->NetCommonsFrame->setView($this, $frameId)) {
			throw new ForbiddenException();
		}

		//Edumapデータを取得
		$edumap = $this->Edumap->getEdumap(
				$this->viewVars['blockId'],
				$this->viewVars['contentEditable']
			);

		//生徒数を取得
		$edumap_student = $this->EdumapStudent->getEdumapStudent($edumap['Edumap']['key']);

		$this->set('edumap', $edumap);
		$this->set('edumap_student', $edumap_student);

		return $this->render('EdumapEdit/view', false);
	}

	public function view2($frameId = 0) {
		//Frameのデータをviewにセット
		if (! $this->NetCommonsFrame->setView($this, $frameId)) {
			throw new ForbiddenException();
		}
		
		//Edumapデータを取得
		$edumap = $this->Edumap->getEdumap(
				$this->viewVars['blockId'],
				$this->viewVars['contentEditable']
			);
		$this->set('edumap', $edumap);
		
		return $this->render('EdumapEdit/view2', false);
	}
	
	public function form($frameId = 0) {
		$this->view($frameId);
		return $this->render('EdumapEdit/form', false);
	}

	public function form2($frameId = 0) {
		$this->view($frameId);
		return $this->render('EdumapEdit/form2', false);
	}

	public function edit() {
		if (! $this->request->isPost()) {
			throw new MethodNotAllowedException();
		}

		$postData = $this->data;
		unset($postData['Edumap']['id']);

		$frameId = (isset($postData['Frame']['id']) ? (int)$postData['Frame']['id'] : 0);
		//Frameのデータをviewにセット
		if (! $this->NetCommonsFrame->setView($this, $frameId)) {
			throw new ForbiddenException();
		}

		//登録
		$result = $this->Edumap->saveEdumap($postData);
		if (! $result) {
			throw new ForbiddenException(__d('net_commons', 'Failed to register data.'));
		}

		$edumap = $this->Edumap->getEdumap(
				$result['Edumap']['block_id'],
				$this->viewVars['contentEditable']
			);

		$result = array(
			'name' => __d('net_commons', 'Successfully finished.'),
			'edumap' => $edumap,
		);

		$this->set(compact('result'));
		$this->set('_serialize', 'result');
		return $this->render(false);
	}
	
	public function edit2() {
		if (! $this->request->isPost()) {
			throw new MethodNotAllowedException();
		}

		$postData = $this->data;
		unset($postData['Edumap']['id']);
		
		$frameId = (isset($postData['Frame']['id']) ? (int)$postData['Frame']['id'] : 0);
		//Frameのデータをviewにセット
		if (! $this->NetCommonsFrame->setView($this, $frameId)) {
			throw new ForbiddenException();
		}

		//登録
		$result = $this->EdumapVisibilityFrameSetting->saveEdumapVisibilityFrameSetting($postData);
		if (! $result) {
			throw new ForbiddenException(__d('net_commons', 'Failed to register data.'));
		}

		$edumap = $this->Edumap->getEdumap(
				$this->viewVars['blockId'],
				$this->viewVars['contentEditable']
			);

		$edumap_visibility_frame_setting = $this->EdumapVisibilityFrameSetting->getEdumapVisibilityFrameSetting();

		$result = array(
			'name' => __d('net_commons', 'Successfully finished.'),
			'edumap' => $edumap,
			'edumap_visibility_frame_setting' => $edumap_visibility_frame_setting,
		);

		$this->set(compact('result'));
		$this->set('_serialize', 'result');
		return $this->render(false);
	}

}
?>
