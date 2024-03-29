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
	const DATE_SEPARATOR = '/';

/**
 * input name
 *
 * @var string
 */
	const AVATAR_INPUT = 'avatar';

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
		'NetCommons.OriginalKey',
		'NetCommons.Publishable',
		'Files.YAUpload' => array(
			self::AVATAR_INPUT => array(
				//UploadBefavior settings
			)
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
			'className' => 'Blocks.Block',
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
					//'required' => true,
					'on' => 'update', // Limit validation to 'create' or 'update' operations
				)
			),
			'file_id' => array(
				'numeric' => array(
					'rule' => array('numeric'),
					'message' => __d('net_commons', 'Invalid request.'),
					'allowEmpty' => true
				)
			),

			//key to set in OriginalKeyBehavior.

			//status to set in PublishableBehavior.

			'is_auto_translated' => array(
				'boolean' => array(
					'rule' => array('boolean'),
					'message' => __d('net_commons', 'Invalid request.'),
				)
			),
			'name' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'School name')),
					'required' => true,
				)
			),
			'handle' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Handle name')),
					//'required' => true,
				)
			),
			'postal_code' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Postal code')),
					//'required' => true,
				),
				'postal' => array(
					'rule' => '/^\d{3}-\d{4}$/',
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Postal code'), '999-9999')
				),
			),
			'prefecture_code' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Prefecture')),
					//'required' => true,
				),
				'prefectureCode' => array(
					'rule' => '/^0[1-9]|[1-3]\d|4[0-7]$/i',
					'message' => __d('net_commons', 'Invalid request.'),
				),
			),
			'location' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Location')),
					//'required' => true,
				)
			),
			'tel' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Phone number')),
					//'required' => true,
				),
				'phone' => array(
					'rule' => '/^0\d{1,4}-\d{1,4}-\d{1,4}$/',
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Phone number'), __d('edumap', 'Phone number')),
				)
			),
			'fax' => array(
				'phone' => array(
					'rule' => '/^0\d{1,4}-\d{1,4}-\d{1,4}$/',
					'message' => sprintf(__d('net_commons', 'Unauthorized pattern for %s. Please input the data in %s format.'), __d('edumap', 'Fax number'), __d('edumap', 'Fax number')),
					'allowEmpty' => true
				)
			),
			'emergency_email' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => sprintf(__d('net_commons', 'Please input %s.'), __d('edumap', 'Emergency contact email')),
					//'required' => true,
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
 * Get dumap
 *
 * @return array
 */
	public function getEdumap() {
		$conditions = array(
			'Block.id' => Current::read('Block.id'),
			'Block.room_id' => Current::read('Block.room_id'),
		);
		if (Current::permission('content_editable')) {
			$conditions[$this->alias . '.is_latest'] = true;
		} else {
			$conditions[$this->alias . '.is_active'] = true;
		}

		$edumap = $this->find('first', array(
				'recursive' => 0,
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

		//トランザクションBegin
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		try {
			//edumapデータのvalidate
			if (! $this->validateEdumap($data, ['comment'])) {
				return false;
			}

			//アバターのvalidate
			if (! $data = $this->__validateEdumapAvatar($data)) {
				return false;
			}

			//edumapのassciationテーブルのvalidate
			if (! $this->__validateEdumapAssociated($data)) {
				return false;
			}

			//ブロックのvalidate
			if (! $this->Block->validateBlock($data)) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->Block->validationErrors);
				return false;
			}

			//ブロックの登録
			$block = $this->Block->saveByFrameId($data['Frame']['id']);

			//アバターの登録
			$this->__saveEdumapAvatar($data);

			//Edumapの登録
			$this->data[$this->alias]['block_id'] = (int)$block['Block']['id'];
			if (isset($this->data['Edumap']['foundation_date'])) {
				//必ず、foundation_dateとclosed_dateは対で入ってくる
				$this->data['Edumap']['foundation_date'] = str_replace(self::DATE_SEPARATOR, '', $this->data['Edumap']['foundation_date']);
				$this->data['Edumap']['closed_date'] = str_replace(self::DATE_SEPARATOR, '', $this->data['Edumap']['closed_date']);
			}

			if (! $edumap = $this->save(null, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			//Associatedの登録
			$edumap['Block']['key'] = $block['Block']['key'];
			$this->__saveEdumapAssociated($edumap);

			$dataSource->commit();

		} catch (Exception $ex) {
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}

		return $edumap;
	}

/**
 * Validate of edumap
 *
 * @param array $data received post data
 * @param array $contains Optional validate sets
 * @return bool True on success, false on error
 */
	public function validateEdumap($data, $contains = []) {
		$this->set($data);
		$this->validates();
		if ($this->validationErrors) {
			return false;
		}

		//コメントのvalidate
		if (in_array('comment', $contains, true) && isset($data['Comment'])) {
			if (! $this->Comment->validateByStatus($data, array('plugin' => 'edumap', 'caller' => $this->name))) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->Comment->validationErrors);
				return false;
			}
		}
		return true;
	}

/**
 * validateEdumapAvatar method
 *
 * @param array $data received post data
 * @return mixed Array on success, false on error
 */
	private function __validateEdumapAvatar($data) {
		if (isset($data[self::AVATAR_INPUT])) {
			//古いアバターの削除
			if ((int)$data['Edumap']['file_id'] !== 0) {
				$data['DeleteFile'][0]['File'] = array(
					'id' => $data['Edumap']['file_id']
				);
			}
			//アバターデータのvalidate
			if (! $this->FileModel->validateFile($data[self::AVATAR_INPUT], ['associated'])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->FileModel->validationErrors);
				return false;
			}
		}

		//アバター削除のvalidate
		if (isset($data['DeleteFile']) && $data['DeleteFile'][0]['File']['id'] > 0) {
			if (! $deleteFile = $this->FileModel->validateDeletedFiles($data['DeleteFile'][0]['File']['id'])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->FileModel->validationErrors);
				return false;
			}
			$data['DeleteFile'] = $deleteFile;
		}

		return $data;
	}

/**
 * validateEdumapAssociated
 *
 * @param array $data received post data
 * @return bool True on success, false on error
 */
	private function __validateEdumapAssociated($data) {
		//edumap生徒数データのvalidate
		if (array_key_exists('EdumapStudent', $data)) {
			if (! $this->EdumapStudent->validateEdumapStudents($data['EdumapStudent'])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->EdumapStudent->validationErrors);
				return false;
			}
		}
		//edumapSNSデータのvalidate
		if (array_key_exists('EdumapSocialMedium', $data)) {
			if (! $this->EdumapSocialMedium->validateEdumapSocialMedia($data['EdumapSocialMedium'])) {
				$this->validationErrors = Hash::merge($this->validationErrors, $this->EdumapSocialMedium->validationErrors);
				return false;
			}
		}

		return true;
	}

/**
 * saveEdumapAvatar
 *
 * @param array $data received post data
 * @return bool true on success, exception on error
 * @throws InternalErrorException
 */
	private function __saveEdumapAvatar($data) {
		//アバターの削除
		if (isset($data['DeleteFile']) && $data['DeleteFile'][0]['File']['id'] > 0) {
			$this->FileModel->deleteFiles([$data['DeleteFile'][0]['File']['id']]);
			$this->data['Edumap']['file_id'] = 0;
		}

		//アバターの登録
		if (isset($data[self::AVATAR_INPUT])) {
			if (! $file = $this->FileModel->save(
					$data[self::AVATAR_INPUT],
					array('validate' => false, 'callbacks' => 'before')
			)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			if (! $this->FileModel->saveFileAssociated($file)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
			$this->data[self::AVATAR_INPUT] = Hash::insert(
				$data[self::AVATAR_INPUT], '{s}.id', (int)$file[$this->FileModel->alias]['id']
			);
			$this->data['Edumap']['file_id'] = $this->data[self::AVATAR_INPUT][$this->FileModel->alias]['id'];
		}

		return true;
	}

/**
 * saveEdumapAssociated
 *
 * @param array $data received post data
 * @return bool true on success, exception on error
 * @throws InternalErrorException
 */
	private function __saveEdumapAssociated($data) {
		//Edumap生徒数の登録
		if (isset($data['EdumapStudent'])) {
			$data['EdumapStudent'] = Hash::insert($data['EdumapStudent'], '{n}.edumap_id', $data[$this->alias]['id']);
			$this->EdumapStudent->saveEdumapStudents($data);
		}
		//EdumapSNSデータの登録
		if (isset($data['EdumapSocialMedium'])) {
			$data['EdumapSocialMedium'] = Hash::insert($data['EdumapSocialMedium'], '{s}.edumap_id', $data[$this->alias]['id']);
			$this->EdumapSocialMedium->saveEdumapSocialMedia($data);
		}
		//コメントの登録
		if ($this->Comment->data) {
			$this->Comment->data[$this->Comment->name]['plugin_key'] = 'edumap';
			$this->Comment->data[$this->Comment->name]['block_key'] = $data['Block']['key'];
			$this->Comment->data[$this->Comment->name]['content_key'] = $data[$this->alias]['key'];
			if (! $this->Comment->save(null, false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		}
		//表示方法変更(デフォルト値)の登録
		if (isset($data['EdumapVisibilitySetting'])) {
			$data['EdumapVisibilitySetting']['edumap_key'] = $data[$this->alias]['key'];
			if (! $this->EdumapVisibilitySetting->save($data['EdumapVisibilitySetting'], false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}
		}

		return true;
	}

/**
 * Delete faq
 *
 * @param array $data received post data
 * @return mixed On success Model::$data if its not empty or true, false on failure
 * @throws InternalErrorException
 */
	public function deleteEdumap($data) {
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

		//トランザクションBegin
		$this->setDataSource('master');
		$dataSource = $this->getDataSource();
		$dataSource->begin();

		$conditions = array(
			$this->alias . '.key' => $data[$this->alias]['key']
		);
		$edumaps = $this->find('all', array(
				'recursive' => -1,
				'fields' => array('id', 'file_id'),
				'conditions' => $conditions,
			)
		);
		$edumapIds = Hash::extract($edumaps, '{n}.Edumap.id');
		$fileIds = Hash::extract($edumaps, '{n}.Edumap.file_id');

		try {
			if (! $this->deleteAll(array($this->alias . '.key' => $data[$this->alias]['key']), false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			if (! $this->EdumapSocialMedium->deleteAll(array($this->EdumapSocialMedium->alias . '.edumap_id' => $edumapIds), false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			if (! $this->EdumapStudent->deleteAll(array($this->EdumapStudent->alias . '.edumap_id' => $edumapIds), false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			if (! $this->EdumapVisibilitySetting->deleteAll(array($this->EdumapVisibilitySetting->alias . '.edumap_key' => $data[$this->alias]['key']), false)) {
				throw new InternalErrorException(__d('net_commons', 'Internal Server Error'));
			}

			//コメントの削除
			$this->Comment->deleteByBlockKey($data['Block']['key']);

			//Blockデータ削除
			$this->Block->deleteBlock($data['Block']['key']);

			//ファイルデータ削除
			$this->FileModel->deleteFiles($fileIds);

			//トランザクションCommit
			$dataSource->commit();

		} catch (Exception $ex) {
			//トランザクションRollback
			$dataSource->rollback();
			CakeLog::error($ex);
			throw $ex;
		}

		return true;
	}

}
