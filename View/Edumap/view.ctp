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

<div class="nc-content-list">
	<article>
		<?php if ($contentEditable) : ?>
			<div class="clearfix">
				<div class="pull-left">
					<?php echo $this->element('NetCommons.status_label', array(
							'status' => isset($edumap['status']) ? $edumap['status'] : null
						)); ?>
				</div>
				<div class="pull-right">
					<span class="nc-tooltip" tooltip="<?php echo __d('net_commons', 'Edit'); ?>">
						<a href="<?php echo $this->Html->url('/edumap/edumap/edit/' . $frameId) ?>" class="btn btn-primary">
							<span class="glyphicon glyphicon-edit"> </span>
						</a>
					</span>
				</div>
			</div>
		<?php endif; ?>

		<?php if ($edumap) : ?>
			<?php echo $this->element('Edumap/view_contents'); ?>
		<?php endif; ?>
	</article>
</div>
