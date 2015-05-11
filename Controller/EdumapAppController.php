<?php
/**
 * EdumapApp Controller
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('AppController', 'Controller');

/**
 * EdumapApp Controller
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Controller
 */
class EdumapAppController extends AppController {

/**
 * layout
 *
 * @var array
 */
	//public $layout = 'NetCommons.default2';

/**
 * use component
 *
 * @var array
 */
	public $components = array(
		'NetCommons.NetCommonsFrame',
		'Security',
	);
/**
 * use models
 *
 * @var array
 */
	public $uses = array(
		'Edumap.Edumap',
	);

/**
 * initEdumap
 *
 * @param array $contains Optional result sets
 * @return bool True on success, False on failure
 */
	public function initEdumap($contains = []) {
		if (! $edumap = $this->Edumap->getEdumap(
				$this->viewVars['blockId'],
				$this->viewVars['roomId'],
				$this->viewVars['contentEditable']
		)) {
			$this->throwBadRequest();
			return false;
		}
		$edumap = $this->camelizeKeyRecursive($edumap);
		$this->set($edumap);

		if (in_array('edumapVisibilitySetting', $contains, true)) {
			if (! $visibilitySetting = $this->EdumapVisibilitySetting->getEdumapVisibilitySetting($this->viewVars['edumap']['key'])) {
				$this->throwBadRequest();
				return false;
			}
			$visibilitySetting = $this->camelizeKeyRecursive($visibilitySetting);
			$this->set($visibilitySetting);
		}

		$this->set('userId', (int)$this->Auth->user('id'));

		return true;
	}

/**
 * initTabs
 *
 * @param string $mainActiveTab Main active tab
 * @param string $blockActiveTab Block active tab
 * @return void
 */
	public function initTabs($mainActiveTab, $blockActiveTab) {
		//タブの設定
		$settingTabs = array(
			'tabs' => array(
				'block_index' => array(
					'url' => array(
						'plugin' => $this->params['plugin'],
						'controller' => 'blocks',
						'action' => 'index',
						$this->viewVars['frameId'],
					)
				),
			),
			'active' => $mainActiveTab
		);
		$this->set('settingTabs', $settingTabs);

		$blockSettingTabs = array(
			'tabs' => array(
				'block_settings' => array(
					'url' => array(
						'plugin' => $this->params['plugin'],
						'controller' => 'blocks',
						'action' => $this->params['action'],
						$this->viewVars['frameId'],
						$this->viewVars['blockId']
					)
				),
			),
			'active' => $blockActiveTab
		);

		if ($this->params['action'] === 'edit') {
			$blockSettingTabs['tabs']['visibility_settings'] = array(
				'url' => array(
					'plugin' => $this->params['plugin'],
					'controller' => 'visibility_settings',
					'action' => 'edit',
					$this->viewVars['frameId'],
					$this->viewVars['blockId']
				),
				'label' => __d('edumap', 'Edumap visibilty settings'),
			);
		}

		$this->set('blockSettingTabs', $blockSettingTabs);
	}

}
