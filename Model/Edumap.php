<?php


App::uses('EdumapAppModel', 'Edumap.Model');

class Edumap extends EdumapAppModel {

	public $validate = array(
		'block_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid request.',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'key' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				'message' => 'Invalid request.',
				//'allowEmpty' => false,
				//'required' => false,
				'last' => true, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Invalid request.',
				//'allowEmpty' => false,
				//'required' => false,
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
	
	//public $hasmany = array(
		//'EdumapStudent' => array(
			//'className' => 'EdumapStudent',
			//'foreignKey' => 'edumap_id',
			//'conditions' => '',
			//'fields' => '',
			//'order' => ''
		//)
	//);

	public function getEdumap($blockId, $contentEditable) {
		$conditions = array(
			'block_id' => $blockId,
		);

		if (! $contentEditable) {
			$conditions['status'] = NetCommonsBlockComponent::STATUS_PUBLISHED;
			$search_conditions['status'] = NetCommonsBlockComponent::STATUS_PUBLISHED;

			$edumap = $this->find('first', array(
					'conditions' => $search_conditions,
					'order' => 'Edumap.id DESC',
				)
			);
		} else {
			$edumap = $this->find('first', array(
					'order' => 'Edumap.id DESC',
				)
			);

		}
			
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
			
			//blockとは別方式でのモデル呼び出し
			App::import('Model','Edumap.EdumapStudent');
			$EdumapStudent = new EdumapStudent;
			//edumapStudentテーブル登録
			$edumapStudent['EdumapStudent'] = $postData['Edumap_student'];
			for($i=0 ; $i<12 ; $i++)
			{
				$edumapStudent['EdumapStudent'][$i]['edumap_key'] = $postData['Edumap']['key'];
				$edumapStudent['EdumapStudent'][$i]['year'] = '0000';
				$edumapStudent['EdumapStudent'][$i]['gendar'] = $i%2;
				$edumapStudent['EdumapStudent'][$i]['grade'] = floor($i/2+1);
				$edumapStudent['EdumapStudent'][$i]['created_user'] = CakeSession::read('Auth.User.id');
			}
				$edumapStudent = $EdumapStudent->saveAll($edumapStudent['EdumapStudent']);
			if (! $edumapStudent) {
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
