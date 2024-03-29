<?php
/**
 * EdumapSocialMedium Model
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
 * EdumapSocialMedium Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Model
 */
class EdumapSocialMedium extends EdumapAppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		//valueフィールドのvalidate定義は、SNSによってはチェックが異なるため、
		//validateEdumapSocialMediaで動的にセットする。
		'value' => array()
	);

/**
 * Social type twitter
 *
 * @var string
 */
	const SOCIAL_TYPE_TWITTER = 'twitter';

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
			'type' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					'required' => true,
				),
				'inList' => array(
					'rule' => array('inList', array(self::SOCIAL_TYPE_TWITTER)),
					'message' => __d('net_commons', 'Invalid request.'),
				)
			),
			'value' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					'required' => true,
				),
				'alphaNumeric' => array(
					'rule' => '/^[0-9a-z]+$/i',
					'message' => __d('net_commons', 'Only alphabets and numbers are allowed.'),
					'allowEmpty' => false,
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
	public function validateEdumapSocialMedia($data) {
		$this->validateMany($data);
		if ($this->validationErrors) {
			return false;
		}
		return true;
	}

/**
 * save EdumapSocialMedia
 *
 * @param array $data received post data
 * @return void
 * @throws InternalErrorException
 */
	public function saveEdumapSocialMedia($data) {
		$indexes = array_keys($data['EdumapSocialMedium']);
		foreach ($indexes as $i) {
			$this->create();
			if (! $this->save($data['EdumapSocialMedium'][$i], false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		}
	}

}
