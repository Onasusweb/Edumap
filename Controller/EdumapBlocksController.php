<?php
/**
 * Blocks Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Kotaro Hokada <kotaro.hokada@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapAppController', 'Edumap.Controller');

/**
 * Blocks Controller
 *
 * @author Kotaro Hokada <kotaro.hokada@gmail.com>
 * @package NetCommons\Iframes\Controller
 */
class EdumapBlocksController extends EdumapAppController {

/**
 * layout
 *
 * @var array
 */
	public $layout = 'NetCommons.setting';

/**
 * use models
 *
 * @var array
 */
	public $uses = array(
		'Blocks.Block',
		'Edumap.EdumapVisibilitySetting'
	);

/**
 * use components
 *
 * @var array
 */
	public $components = array(
		'NetCommons.Permission' => array(
			//アクセスの権限
			'allow' => array(
				'index,add,edit,delete' => 'block_editable',
			),
		),
		'Paginator',
	);

/**
 * use helpers
 *
 * @var array
 */
	public $helpers = array(
		'NetCommons.Date',
	);

/**
 * beforeFilter
 *
 * @return void
 */
	public function beforeFilter() {
		parent::beforeFilter();

		//タブの設定
		$this->initTabs('block_index', 'block_settings');
	}

/**
 * index
 *
 * @return void
 */
	public function index() {
		$this->Paginator->settings = array(
			'Edumap' => array(
				'order' => array('Edumap.id' => 'desc'),
				'conditions' => $this->Edumap->getBlockConditions(array(
					'Edumap.is_latest' => true,
				)),
			)
		);

		$edumaps = $this->Paginator->paginate('Edumap');
		if (! $edumaps) {
			$this->view = 'Blocks.Blocks/not_found';
			return;
		}

		$results = array(
			'edumaps' => $edumaps
		);
		$results = $this->camelizeKeyRecursive($results);
		$this->set($results);
	}

/**
 * add
 *
 * @return void
 */
	public function add() {
		$this->view = 'edit';

		$this->set('blockId', null);
		$edumap = $this->Edumap->create(
			array(
				'id' => null,
				'key' => null,
				'block_id' => null,
				'name' => __d('edumap', 'New school %s ', date('YmdHis')),
			)
		);
		$block = $this->Block->create(
			array('id' => null, 'key' => null)
		);

		$data = array();
		if ($this->request->isPost()) {
			$data = $this->__parseRequestData();
			$data['Edumap']['status'] = NetCommonsBlockComponent::STATUS_PUBLISHED;

			$visibilitySetting = $this->EdumapVisibilitySetting->create();
			$data = Hash::merge($data, $visibilitySetting);

			$edumap = $this->Edumap->saveEdumap($data);
			if ($this->NetCommons->handleValidationError($this->Edumap->validationErrors)) {
				if (! $this->request->is('ajax')) {
					$this->redirect('/edumap/edumap_visibility_settings/edit/' . Current::read('Frame.id') . '/' . $edumap['Edumap']['block_id']);
				}
				return;
			}

			$data['Block']['id'] = null;
			$data['Block']['key'] = null;
		}

		$data = Hash::merge($edumap, $block, $data);
		$results = $this->camelizeKeyRecursive($data);
		$this->set($results);
	}

/**
 * edit
 *
 * @return void
 */
	public function edit() {
		if (! $this->NetCommonsBlock->validateBlockId()) {
			$this->throwBadRequest();
			return false;
		}
		$this->set('blockId', (int)$this->params['pass'][1]);

		if (! $this->initEdumap()) {
			return;
		}

		if ($this->request->isPost()) {
			$data = $this->__parseRequestData();

			$this->Edumap->saveEdumap($data);
			if ($this->NetCommons->handleValidationError($this->Edumap->validationErrors)) {
				if (! $this->request->is('ajax')) {
					$this->redirect('/edumap/edumap_blocks/index/' . Current::read('Frame.id'));
				}
				return;
			}

			$results = $this->camelizeKeyRecursive($data);
			$this->set($results);
		}
	}

/**
 * delete
 *
 * @throws BadRequestException
 * @return void
 */
	public function delete() {
		if (! $this->NetCommonsBlock->validateBlockId()) {
			$this->throwBadRequest();
			return false;
		}
		$this->set('blockId', (int)$this->params['pass'][1]);

		if (! $this->initEdumap()) {
			return;
		}

		if ($this->request->isDelete()) {
			if ($this->Edumap->deleteEdumap($this->data)) {
				if (! $this->request->is('ajax')) {
					$this->redirect('/edumap/edumap_blocks/index/' . Current::read('Frame.id'));
				}
				return;
			}
		}

		$this->throwBadRequest();
	}

/**
 * Parse data from request
 *
 * @return array
 */
	private function __parseRequestData() {
		$data = $this->data;
		if ($data['Block']['public_type'] === Block::TYPE_LIMITED) {
			//$data['Block']['from'] = implode('-', $data['Block']['from']);
			//$data['Block']['to'] = implode('-', $data['Block']['to']);
		} else {
			unset($data['Block']['from'], $data['Block']['to']);
		}

		return $data;
	}

}
