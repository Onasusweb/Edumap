<?php
/**
 * edumap edit template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php echo $this->Form->hidden('Frame.id', array(
	'value' => (int)$frameId
)); ?>

<?php echo $this->Form->hidden('Block.id', array(
	'value' => (int)$blockId,
)); ?>

<?php echo $this->Form->hidden('EdumapVisibilitySetting.id', array(
	'value' => isset($edumapVisibilitySetting['id']) ? (int)$edumapVisibilitySetting['id'] : '',
)); ?>

<?php echo $this->Form->hidden('EdumapVisibilitySetting.edumap_key', array(
	'value' => isset($edumapVisibilitySetting['edumapKey']) ? $edumapVisibilitySetting['edumapKey'] : '',
)); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'file', 'label' => __d('edumap', 'Avatar'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'name', 'label' => __d('edumap', 'School name'), 'attributes' => array('disabled' => true))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'nameKana', 'label' => __d('edumap', 'School name(kana)'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'handle', 'label' => __d('edumap', 'Handle name'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'postalCode', 'label' => __d('edumap', 'Postal code'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'prefecture', 'label' => __d('edumap', 'Prefecture'))
		); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'location', 'label' => __d('edumap', 'Location'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'tel', 'label' => __d('edumap', 'Phone number'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'fax', 'label' => __d('edumap', 'Fax number'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'emergencyEmail', 'label' => __d('edumap', 'Emergency contact email'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'inquiry', 'label' => __d('edumap', 'Inquiry'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'siteUrl', 'label' => __d('edumap', 'Site URL'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'foundationDate', 'label' => __d('edumap', 'Foundation date'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'closedDate', 'label' => __d('edumap', 'Closed date'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'rssUrl', 'label' => __d('edumap', 'RSS URL'))); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'governorType', 'label' => __d('edumap', 'Governing body type'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'educationType', 'label' => __d('edumap', 'Education type'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'coeducationType', 'label' => __d('edumap', 'Coeducation'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'principalName', 'label' => __d('edumap', 'Principal name'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'principalEmail', 'label' => __d('edumap', 'Principal email'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'students', 'label' => __d('edumap', 'Number of students'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'socialMedia', 'label' => __d('edumap', 'Social media'))
	); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input',
		array('field' => 'description', 'label' => __d('edumap', 'Description'))
	);
