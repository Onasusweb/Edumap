<?php
/**
 * Blocks edit template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php echo $this->Form->hidden('Frame.id', array(
		'value' => $frameId,
	)); ?>

<?php echo $this->Form->hidden('Block.id', array(
		'value' => $block['id'],
	)); ?>

<?php echo $this->Form->hidden('Block.key', array(
		'value' => $block['key'],
	)); ?>

<?php echo $this->Form->hidden('Block.language_id', array(
		'value' => $languageId,
	)); ?>

<?php echo $this->Form->hidden('Block.room_id', array(
		'value' => $roomId,
	)); ?>

<?php echo $this->Form->hidden('Block.plugin_key', array(
		'value' => $this->params['plugin'],
	)); ?>

<?php echo $this->Form->hidden('Edumap.id', array(
		'value' => isset($edumap['id']) ? (int)$edumap['id'] : null,
	)); ?>

<?php echo $this->Form->hidden('Edumap.key', array(
		'value' => isset($edumap['key']) ? $edumap['key'] : null,
	)); ?>

<?php echo $this->Form->hidden('Edumap.language_id', array(
		'value' => $languageId,
	)); ?>

<div class="form-group">
	<?php echo $this->Form->input(
			'Edumap.name', array(
				'type' => 'text',
				'label' => __d('edumap', 'School name') . $this->element('NetCommons.required'),
				'error' => false,
				'class' => 'form-control',
				'autofocus' => true,
				'value' => (isset($edumap['name']) ? $edumap['name'] : '')
			)
		); ?>

	<?php echo $this->element(
		'NetCommons.errors', [
			'errors' => $this->validationErrors,
			'model' => 'Edumap',
			'field' => 'name',
		]); ?>
</div>

<?php echo $this->element('Blocks.public_type');
