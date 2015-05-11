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
<?php echo $this->Html->meta(
		array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, user-scalable=no'),
		null,
		array('inline' => false)
	); ?>

<?php echo $this->Html->css('/edumap/css/style.css', false); ?>

<div id="nc-edumap-<?php echo (int)$frameId; ?>">
	<div class="modal-body">
		<?php echo $this->Form->create('Edumap', array(
			'name' => 'form',
			'novalidate' => true,
			'type' => 'file'
		)); ?>

			<div class="panel panel-default">
				<div class="panel-body has-feedback">
					<?php echo $this->element('Edumap/edit_form'); ?>

					<hr />

					<?php echo $this->element('Comments.form'); ?>

				</div>

				<div class="panel-footer text-center">
					<?php echo $this->element('NetCommons.workflow_buttons'); ?>
				</div>
			</div>

			<?php echo $this->element('Comments.index'); ?>

		<?php echo $this->Form->end(); ?>
	</div>
</div>





