<?php
/**
 * Edumap Model
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
App::uses('UploadBehavior', 'Upload.Model/Behavior');
App::uses('Folder', 'Utility');
App::uses('JpValidation', 'Localized.Validation');
App::uses('CakeTime', 'Utility');

/**
 * Edumap Model
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Model
 */
class Edumap extends EdumapAppModel {

/**
 * Gendar Female
 *
 * @var string
 */
	const COUNTRY_CODE = 'jp';

/**
 * Gendar Female
 *
 * @var string
 */
	const DATE_SEPARATOR = '/';

/**
 * input name
 *
 * @var string
 */
	const INPUT_NAME = 'upload';

/**
 * input name
 *
 * @var string
 */
	const AVATAR_INPUT_NAME = 'avatar';

/**
 * Custom database table name
 *
 * @var string
 */
	public $useTable = 'edumap';

/**
 * use behaviors
 *
 * @var array
 */
	public $actsAs = array(
		'NetCommons.Publishable',
		'Containable',
		'Files.YAUpload' => array(
			self::INPUT_NAME => array(
				//UploadBefavior settings
			),
			self::AVATAR_INPUT_NAME => array()
		),
	);

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Block' => array(
			'className' => 'Block',
			'foreignKey' => 'block_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'File' => array(
			'className' => 'Files.FileModel',
			'foreignKey' => 'file_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EdumapVisibilitySetting' => array(
			'className' => 'Edumap.EdumapVisibilitySetting',
			'foreignKey' => false,
			'conditions' => array('EdumapVisibilitySetting.edumap_key = Edumap.key'),
			'fields' => '',
			'order' => ''
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
 * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
 */
	public function beforeValidate($options = array()) {
		$this->validate = Hash::merge($this->validate, array(
			'block_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					'required' => true,
				)
			),
			'file_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => true
				)
			),
			'key' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => false,
					'required' => true,
				)
			),

			//status to set in PublishableBehavior.

			'is_auto_translated' => array(
				'boolean' => array(
					'rule' => array('boolean'),
					'message' => __d('net_commons', 'Invalid request.'),
				)
			),
			'name' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'School name')),
					'required' => true,
				)
			),
			'handle' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Handle name')),
					'required' => true,
				)
			),
			'postal_code' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Postal code')),
					'required' => true,
				),
				'postal' => array(
					'rule' => array('postal', null, self::COUNTRY_CODE),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Postal code'), '999-9999')
				),
			),
			'prefecture_code' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Prefecture')),
					'required' => true,
				),
				'prefectureCode' => array(
					'rule' => '/^(0[1-9]|[1-3][0-9]|4[0-7])$/i',
					'message' => __d('net_commons', 'Invalid request.'),
				),
			),
			'location' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Location')),
					'required' => true,
				)
			),
			'tel' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Phone number')),
					'required' => true,
				),
				'phone' => array(
					'rule' => array('phone', null, self::COUNTRY_CODE),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Phone number'), __d('edumap', 'Phone number')),
				)
			),
			'fax' => array(
				'phone' => array(
					'rule' => array('phone', null, self::COUNTRY_CODE),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Fax number'), __d('edumap', 'Fax number')),
					'allowEmpty' => true
				)
			),
			'emergency_email' => array(
				'notEmpty' => array(
					'rule' => array('notEmpty'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Emergency contact email')),
					'required' => true,
				),
				'email' => array(
					'rule' => array('email'),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Emergency contact email'), __d('edumap', 'E-mail'))
				)
			),
			'site_url' => array(
				'url' => array(
					'rule' => array('url'),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Site URL'), __d('edumap', 'URL')),
					'allowEmpty' => true
				)
			),
			'rss_url' => array(
				'url' => array(
					'rule' => array('url'),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'RSS URL'), __d('edumap', 'URL')),
					'allowEmpty' => true
				)
			),
			'foundation_date' => array(
				'date' => array(
					'rule' => array('date', 'ym'),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Foundation date'), __d('edumap', 'Date')),
					'allowEmpty' => true
				),
			),
			'closed_date' => array(
				'date' => array(
					'rule' => array('date', 'ym'),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Closed date'), __d('edumap', 'Date')),
					'allowEmpty' => true
				)
			),
			'principal_email' => array(
				'email' => array(
					'rule' => array('email'),
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Principal email'), __d('edumap', 'E-mail')),
					'allowEmpty' => true
				)
			),
		));

		return parent::beforeValidate($options);
	}

/**
 * get dumap
 *
 * @param int $frameId frames.id
 * @param int $blockId blocks.id
 * @param bool $contentEditable true can edit the content, false not can edit the content.
 * @return array
 */
	public function getEdumap($frameId, $blockId, $contentEditable) {
		$conditions = array(
			$this->alias . '.block_id' => $blockId,
		);
		if (! $contentEditable) {
			$conditions[$this->alias . '.status'] = NetCommonsBlockComponent::STATUS_PUBLISHED;
		}

		$edumap = $this->find('first', array(
				'recursive' => -1,
				'conditions' => $conditions,
				'order' => $this->alias . '.id DESC'
			)
		);

		return $edumap;
	}

/**
 * save edumap
 *
 * @param array $data received post data
 * @return bool true on success, false on error
 * @throws InternalErrorException
 */
	public function saveEdumap($data) {
		$this->loadModels([
			'Edumap' => 'Edumap.Edumap',
			'EdumapSocialMedium' => 'Edumap.EdumapSocialMedium',
			'EdumapStudent' => 'Edumap.EdumapStudent',
			'EdumapVisibilitySetting' => 'Edumap.EdumapVisibilitySetting',
			'Block' => 'Blocks.Block',
			'Comment' => 'Comments.Comment',
			'FileModel' => 'Files.FileModel',
			'FilesPlugin' => 'Files.FilesPlugin',
			'FilesRoom' => 'Files.FilesRoom',
			'FilesUser' => 'Files.FilesUser',
		]);

		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			//edumapデータのvalidate
			if (! $this->validateEdumap($data)) {
				return false;
			}
			$this->data['Edumap']['foundation_date'] = str_replace(Edumap::DATE_SEPARATOR, '', $this->data['Edumap']['foundation_date']);
			$this->data['Edumap']['closed_date'] = str_replace(Edumap::DATE_SEPARATOR, '', $this->data['Edumap']['closed_date']);

			//アバターのvalidate
			if (! $data = $this->validateEdumapAvatar($data)) {
				return false;
			}

			//Associatedのvalidate
			if (! $this->validateEdumapAssociated($data)) {
				return false;
			}

			//ブロックの登録
			$block = $this->Block->saveByFrameId($data['Frame']['id'], false);
			$this->data['Edumap']['block_id'] = (int)$block['Block']['id'];
			$this->data['Edumap']['language_id'] = (int)$block['Block']['language_id'];

			//ブロック名の登録
			$block['Block']['name'] = $data['Edumap']['name'];
			if (! $this->Block->save($block)) {
				// @codeCoverageIgnoreStart
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				// @codeCoverageIgnoreEnd
			}

			//アバターの登録
			if (! $this->saveEdumapAvatar($data)) {
				// @codeCoverageIgnoreStart
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				// @codeCoverageIgnoreEnd
			}

			//Edumapの登録
			if (! $edumap = $this->save(null, false)) {
				// @codeCoverageIgnoreStart
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				// @codeCoverageIgnoreEnd
			}

			//Associatedの登録
			if (! $this->saveEdumapAssociated($edumap)) {
				// @codeCoverageIgnoreStart
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
				// @codeCoverageIgnoreEnd
			}

			$dataSource->commit();

		} catch (Exception $ex) {
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}

		return $edumap;
	}

/**
 * validate edumap
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	public function validateEdumap($data) {
		$this->set($data);
		$this->validates();
		return $this->validationErrors ? false : true;
	}

/**
 * validateEdumapAvatar method
 *
 * @param array $data received post data
 * @return mixed Array on success, false on error
 */
	public function validateEdumapAvatar($data) {
		//アバター削除のvalidate
		//if (isset($data['DeleteFile'])) {
		//	if (! $deleteFile = $this->FileModel->validateDeletedFiles($data['Edumap']['file_id'])) {
		//		$this->validationErrors = Hash::merge($this->validationErrors, $this->FileModel->validationErrors);
		//		CakeLog::debug('validateEdumapAvatar=' . print_r($this->validationErrors, true));
		//		return false;
		//	}
		//	$data['DeleteFile'] = $deleteFile;
		//}
		//アバターデータのvalidate
		if ($data['Edumap'][self::INPUT_NAME]) {
			if (! $this->FileModel->validateFile($data[self::INPUT_NAME])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->FileModel->validationErrors);
				return false;
			}
			if (! $this->FileModel->validateFileAssociated($data[self::INPUT_NAME])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->FileModel->validationErrors);
				return false;
			}
		}

		return $data;
	}

/**
 * validateEdumapAssociated
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	public function validateEdumapAssociated($data) {
		//edumap生徒数データのvalidate
		if ($data['EdumapStudent']) {
			if (! $this->EdumapStudent->validateEdumapStudents($data['EdumapStudent'])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->EdumapStudent->validationErrors);
				return false;
			}
		}
		//edumapSNSデータのvalidate
		if ($data['EdumapSocialMedium']) {
			if (! $this->EdumapSocialMedium->validateEdumapSocialMedia($data['EdumapSocialMedium'])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->EdumapSocialMedium->validationErrors);
				return false;
			}
		}
		//コメントのvalidate
		if (! $this->Comment->validateByStatus($data, array('caller' => $this->alias))) {
			$this->validationErrors = Hash::merge($this->validationErrors, $this->Comment->validationErrors);
			return false;
		}

		return true;
	}

/**
 * saveEdumapAvatar
 *
 * @param array $data received post data
 * @return bool true on success, false on error
 */
	public function saveEdumapAvatar($data) {
		//アバターの削除
		//if (isset($data['DeleteFile'])) {
		//	//データ削除
		//	if (! $this->FileModel->deleteAll([$this->FileModel->alias . '.id' => $data['Edumap']['file_id']], true, false)) {
		//		return false;
		//	}
		//	if (! $this->FileModel->deleteFileAssociated($data['Edumap']['file_id'])) {
		//		return false;
		//	}
		//	$folder = new Folder();
		//	$folder->delete($data['DeleteFile'][0]['File']['path']);
		//
		//	$this->data['Edumap']['file_id'] = 0;
		//}

		//アバターの登録
		if ($data['Edumap'][self::INPUT_NAME]) {
//			$this->FileModel->set($data[self::INPUT_NAME]);
			CakeLog::debug('Edumap::saveEdumapAvatar() $data 1=' . print_r($data[self::INPUT_NAME], true));
			if (! $file = $this->FileModel->save(
					$data[self::INPUT_NAME],
//					null,
					//false
					array('validate' => false, 'callbacks' => 'before')
			)) {
				return false;
			}
			CakeLog::debug('Edumap::saveEdumapAvatar() $file 1=' . print_r($file, true));
			if (! $this->FileModel->saveFileAssociated($file)) {
				return false;
			}
			//$this->data['Edumap'][self::INPUT_NAME] = (int)$file['File']['id'];
			$this->data['Edumap']['file_id'] = (int)$file['File']['id'];
		}

		if ($data['Edumap'][self::AVATAR_INPUT_NAME]) {
			CakeLog::debug('Edumap::saveEdumapAvatar() $data 2=' . print_r($data[self::AVATAR_INPUT_NAME], true));
			$this->FileModel->create();
			$this->FileModel->set($data[self::AVATAR_INPUT_NAME]);
			if (! $file = $this->FileModel->save(
					$data[self::AVATAR_INPUT_NAME],
//					null,
//					false
					array('validate' => false, 'callbacks' => 'before')
			)) {
				return false;
			}
			CakeLog::debug('Edumap::saveEdumapAvatar() $file 2=' . print_r($file, true));
			if (! $this->FileModel->saveFileAssociated($file)) {
				return false;
			}
			//$this->data['Edumap'][self::AVATAR_INPUT_NAME] = (int)$file['File']['id'];
			$this->data['Edumap']['description'] = (int)$file['File']['id'];
		}

		return true;
	}

/**
 * saveEdumapAssociated
 *
 * @param array $data received post data
 * @return bool true on success, false on error
 */
	public function saveEdumapAssociated($data) {
		//Edumap生徒数の登録
		if (isset($data['EdumapStudent']) && $data['EdumapStudent']) {
			$data['EdumapStudent'] = Hash::insert($data['EdumapStudent'], '{n}.edumap_id', $data[$this->alias]['id']);
			if (! $this->EdumapStudent->saveMany($data['EdumapStudent'], ['validate' => false])) {
				return false;
			}
		}
		//EdumapSNSデータの登録
		if (isset($data['EdumapSocialMedium']) && $data['EdumapSocialMedium']) {
			$data['EdumapSocialMedium'] = Hash::insert($data['EdumapSocialMedium'], '{s}.edumap_id', $data[$this->alias]['id']);
			if (! $this->EdumapSocialMedium->saveMany($data['EdumapSocialMedium'], ['validate' => false])) {
				return false;
			}
		}
		//コメントの登録
		if ($this->Comment->data) {
			$this->Comment->data['Comment']['plugin_key'] = 'edumap';
			if (! $this->Comment->save(null, false)) {
				return false;
			}
		}
		//表示方法変更(デフォルト値)の登録
		if (isset($this->data['EdumapVisibilitySetting'])) {
			if (! $this->EdumapVisibilitySetting->save($this->data['EdumapVisibilitySetting'], false)) {
				return false;
			}
		}

		return true;
	}

}
