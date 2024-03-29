<?php
/**
 * EdumapVisibilitySetting Model
 *
 * @property Edumap $Edumap
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapAppModel', 'Edumap.Model');

/**
 * EdumapVisibilitySetting Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Model
 */
class EdumapVisibilitySetting extends EdumapAppModel {

/**
 * Public visibility
 *
 * @var string
 */
	const PRIVATE_VISIBILITY = '0',
			PUBLIC_VISIBILITY = '1',
			PUBLIC_ON_EDUMAP_VISIBILITY = '2';

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasOne = array(
		'Edumap' => array(
			'className' => 'Edumap.Edumap',
			'foreignKey' => false,
			'conditions' => array('EdumapVisibilitySetting.edumap_key = Edumap.key'),
			'fields' => '',
			'order' => array('Edumap.id' => 'DESC')
		),
	);

/**
 * Called during validation operations, before validation. Please note that custom
 * validation rules can be defined in $validate.
 *
 * @param array $options Options passed from Model::save().
 * @return bool True if validate operation should continue, false to abort
 * @link http://book.cakephp.org/2.0/en/models/callback-methods.html#beforevalidate
 * @see Model::save()
 */
	public function beforeValidate($options = array()) {
		$this->validate = Hash::merge($this->validate, array(
			'edumap_key' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					//'required' => true,
				)
			),
		));

		return parent::beforeValidate($options);
	}

/**
 * Get EdumapVisibilitySetting data
 *
 * @param string $edumapKey edumap.key
 * @return array
 */
	public function getEdumapVisibilitySetting($edumapKey) {
		$conditions = array(
			$this->alias . '.edumap_key' => $edumapKey,
		);

		$visibilitySetting = $this->find('first', array(
				'recursive' => -1,
				'conditions' => $conditions,
			)
		);

		return $visibilitySetting;
	}

/**
 * save edumap
 *
 * @param array $data received post data
 * @return bool true success, false error
 * @throws InternalErrorException
 */
	public function saveEdumapVisibilitySetting($data) {
		$this->loadModels([
			'EdumapVisibilitySetting' => 'Edumap.EdumapVisibilitySetting',
		]);

		//トランザクションBegin
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			//validate処理
			if (! $this->validateEdumapVisibilitySetting($data)) {
				return false;
			}

			//登録処理
			if (! $this->save(null, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			$dataSource->commit();
		} catch (Exception $ex) {
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}

		return true;
	}

/**
 * validate edumap
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	public function validateEdumapVisibilitySetting($data) {
		$this->set($data);
		$this->validates();
		if ($this->validationErrors) {
			return false;
		}
		return true;
	}

}
