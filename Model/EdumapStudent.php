<?php
/**
 * EdumapStudent Model
 *
 * @property Block $Block
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapAppModel', 'Edumap.Model');

/**
 * EdumapStudent Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Model
 */
class EdumapStudent extends EdumapAppModel {

/**
 * Gendar Male
 *
 * @var string
 */
	const GENDAR_MALE = '0';

/**
 * Gendar Female
 *
 * @var string
 */
	const GENDAR_FEMALE = '1';

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
			'gendar' => array(
				'boolean' => array(
					'rule' => array('boolean'),
					'message' => __d('net_commons', 'Invalid request.'),
					//'allowEmpty' => false,
					'required' => true,
				)
			),
			'grade' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					'required' => true,
				)
			),
			'number' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					'required' => true,
				)
			),
		));

		return parent::beforeValidate($options);
	}

/**
 * validate edumap
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	public function validateEdumapStudents($data) {
		$this->validateMany($data);
		if ($this->validationErrors) {
			return false;
		}
		return true;
	}

/**
 * save EdumapStudents
 *
 * @param array $data received post data
 * @return void
 * @throws InternalErrorException
 */
	public function saveEdumapStudents($data) {
		$indexes = array_keys($data['EdumapStudent']);
		foreach ($indexes as $i) {
			$this->create();
			if (! $this->save($data['EdumapStudent'][$i], false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		}
	}

}
