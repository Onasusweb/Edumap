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

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'file', 'label' => __d('edumap', 'Avatar')]); ?>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->label('EdumapVisibilitySetting.name', __d('edumap', 'School name')); ?>

		<div class="edumap_radio">
			<?php echo $this->Edumap->inputVisibilitySetting('EdumapVisibilitySetting.name', array(
				'value' => isset($edumapVisibilitySetting['name']) ? $edumapVisibilitySetting['name'] : '0',
				'legend' => false,
				'separator' => '<span class="edumap_radio_separator"> </span>',
				'disabled' => true
			)); ?>
		</div>
	</div>
</div>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'nameKana', 'label' => __d('edumap', 'School name(kana)')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'handle', 'label' => __d('edumap', 'Handle name')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'postalCode', 'label' => __d('edumap', 'Postal code')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'prefecture', 'label' => __d('edumap', 'Prefecture')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'location', 'label' => __d('edumap', 'Location')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'tel', 'label' => __d('edumap', 'Phone number')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'fax', 'label' => __d('edumap', 'Fax number')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'emergencyEmail', 'label' => __d('edumap', 'Emergency contact email')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'inquiry', 'label' => __d('edumap', 'Inquiry')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'siteUrl', 'label' => __d('edumap', 'Site URL')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'foundationDate', 'label' => __d('edumap', 'Foundation date')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'closedDate', 'label' => __d('edumap', 'Closed date')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'rssUrl', 'label' => __d('edumap', 'RSS URL')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'governorType', 'label' => __d('edumap', 'Governing body type')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'educationType', 'label' => __d('edumap', 'Education type')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'coeducationType', 'label' => __d('edumap', 'Coeducation')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'principalName', 'label' => __d('edumap', 'Principal name')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'principalEmail', 'label' => __d('edumap', 'Principal email')]); ?>

<!-- TODO 生徒数 -->
<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'students', 'label' => __d('edumap', 'Number of students')]); ?>

<!-- TODO SNS(Twitter) -->
<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'socialMedia', 'label' => __d('edumap', 'Social media')]); ?>

<?php echo $this->element('EdumapVisibilitySettings/form_input', ['field' => 'description', 'label' => __d('edumap', 'Description')]);
