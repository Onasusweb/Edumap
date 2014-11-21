<?php


App::uses('EdumapAppModel', 'Edumap.Model');

class Edumap extends EdumapAppModel {
	var $useTable ='edumap';

	public $validate = array(
		'block_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid request.',
				'allowEmpty' => false,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'key' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid request.',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'range' => array(
				'rule' => array('range', 0, 5),
				'message' => 'Invalid request.',
			),
		),
		'is_auto_translated' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Invalid request.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
		'handle' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
		'postal_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
		'prefecture_code' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
		'location' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
		'tel' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
		'emergency_email' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				'required' => true,
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public $belongsTo = array(
		'Block' => array(
			'className' => 'Block',
			'foreignKey' => 'block_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public function getEdumap($blockId, $contentEditable) {
		$conditions = array(
			'block_id' => $blockId,
		);

		if (! $contentEditable) {
			$conditions['status'] = NetCommonsBlockComponent::STATUS_PUBLISHED;
		}
		$edumap = $this->find('first', array(
				'conditions' => $conditions,
				'order' => 'Edumap.id DESC',
			)
		);

		if (! $edumap) {
			$edumap = $this->create();
			$edumap['Edumap']['content'] = '';
			$edumap['Edumap']['status'] = '0';
			$edumap['Edumap']['block_id'] = '0';
			$edumap['Edumap']['key'] = '';
			$edumap['Edumap']['id'] = '0';
		}
		return $edumap;
	}

/**
 * save edumap
 *
 * @param array $postData received post data
 * @return bool true success, false error
 * @throws ForbiddenException
 */
	public function saveEdumap($postData) {
		$models = array(
			'Frame' => 'Frames.Frame',
			'Block' => 'Blocks.Block',

		);
		foreach ($models as $model => $class) {
			$this->$model = ClassRegistry::init($class);
			$this->$model->setDataSource('master');
		}

		//frame関連のセット
		$frame = $this->Frame->findById($postData['Frame']['id']);
		if (! $frame) {
			return false;
		}
		if (! isset($frame['Frame']['block_id']) ||
				$frame['Frame']['block_id'] === '0') {
			//edumapsテーブルのkey生成
			$postData['Edumap']['key'] = hash('sha256', 'edumap_' . microtime());
		}

		//DBへの登録
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		try {
			$blockId = $this->__saveBlock($frame);

			//edumapsテーブル登録
			$edumap['Edumap'] = $postData['Edumap'];
			$edumap['Edumap']['block_id'] = $blockId;
			$edumap['Edumap']['created_user'] = CakeSession::read('Auth.User.id');

			$edumap = $this->save($edumap);
			if (! $edumap) {
				throw new ForbiddenException(serialize($this->validationErrors));
			}
			
			//年度を求める
			if(date("m") < 4) {
				$fiscal_year = date("Y") -1;
			} else {
				$fiscal_year = date("Y");
			}

			//モデル呼び出し
			App::import('Model','Edumap.EdumapStudent');
			$EdumapStudent = new EdumapStudent;
			
			//edumapStudentテーブル登録
			$edumap_student['EdumapStudent'] = $postData['EdumapStudent'];
			
			for($i=0 ; $i<12 ; $i++)
			{
				$edumap_student['EdumapStudent'][$i]['edumap_key'] = $postData['Edumap']['key'];
				$edumap_student['EdumapStudent'][$i]['year'] = $fiscal_year;
				$edumap_student['EdumapStudent'][$i]['gendar'] = $i%2;
				$edumap_student['EdumapStudent'][$i]['grade'] = floor($i/2+1);
				$edumap_student['EdumapStudent'][$i]['created_user'] = CakeSession::read('Auth.User.id');
			}
				$EdumapStudent = $EdumapStudent->saveAll($edumap_student['EdumapStudent']);
			if (! $EdumapStudent) {
				throw new ForbiddenException(serialize($this->validationErrors));
			}

			//モデル呼び出し
			App::import('Model','Edumap.EdumapSocialMedium');
			$EdumapSocialMedium = new EdumapSocialMedium;
			
			//EdumapSocialMediumテーブル登録
			$edumap_social_media['EdumapSocialMedium'] = $postData['EdumapSocialMedium'];
			$edumap_social_media['EdumapSocialMedium']['edumap_key'] = $edumap['Edumap']['key'];
			$edumap_social_media['EdumapSocialMedium']['type'] = 'twitter';
			$edumap_social_media['EdumapSocialMedium']['created_user'] = CakeSession::read('Auth.User.id');

			$EdumapSocialMedium = $EdumapSocialMedium->save($edumap_social_media);
			if (! $EdumapSocialMedium) {
				throw new ForbiddenException(serialize($this->validationErrors));
			}

			$dataSource->commit();
			return $edumap;
			
		} catch (Exception $ex) {
			CakeLog::error($ex->getTraceAsString());
			$dataSource->rollback();
			return false;
		}
	}

/**
 * save block
 *
 * @param array $frame frame data
 * @return int blocks.id
 * @throws ForbiddenException
 */
	private function __saveBlock($frame) {
		if (! isset($frame['Frame']['block_id']) ||
				$frame['Frame']['block_id'] === '0') {
			//blocksテーブル登録
			$block = array();
			$block['Block']['room_id'] = $frame['Frame']['room_id'];
			$block['Block']['language_id'] = $frame['Frame']['language_id'];
			$block = $this->Block->save($block);
			if (! $block) {
				throw new ForbiddenException(serialize($this->Block->validationErrors));
			}
			$blockId = (int)$block['Block']['id'];

			//framesテーブル更新
			$frame['Frame']['block_id'] = $blockId;
			if (! $this->Frame->save($frame)) {
				throw new ForbiddenException(serialize($this->Frame->validationErrors));
			}
		}

		return (int)$frame['Frame']['block_id'];
	}
}
