<?php
/**
 * edumap view template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<div id="nc-edumap-<?php echo (int)$frameId; ?>">
	<div class="row">
		<div class="col-xs-6">
			<?php echo $this->element('NetCommons.status_label',
					array('status' => $edumap['status'])); ?>
		</div>
		<div class="col-xs-6 text-right">
			<span class="nc-tooltip" tooltip="<?php echo __d('net_commons', 'Edit'); ?>">
				<a href="<?php echo $this->Html->url('/edumap/edumap/edit/' . $frameId) ?>" class="btn btn-primary">
					<span class="glyphicon glyphicon-edit"> </span>
				</a>
			</span>
		</div>
	</div>

	<p>
		<?php echo $this->element('Edumap/view_contents'); ?>
	</p>
</div>
