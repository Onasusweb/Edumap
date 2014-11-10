<?php
/**
 * edumap edit form view template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

echo $this->Form->input('Frame.id', array(
			'type' => 'hidden',
			'value' => (int)$frameId,
			'ng-model' => 'edit.data.Frame.id'
		)
	);

echo $this->Form->input('Edumap.block_id', array(
			'type' => 'hidden',
			'value' => (int)$blockId,
			'ng-model' => 'edit.data.Edumap.block_id',
		)
	);

echo $this->Form->input('Edumap.key', array(
			'type' => 'hidden',
			'value' => $edumap['Edumap']['key'],
			'ng-model' => 'edit.data.Edumap.key',
		)
	);

echo $this->Form->input('Edumap.id', array(
			'type' => 'hidden',
			'value' => (int)$edumap['Edumap']['id'],
			'ng-model' => 'edit.data.Edumap.id',
		)
	);
