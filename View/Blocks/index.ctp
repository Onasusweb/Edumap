<?php
/**
 * block index template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Ryo Ozawa <ozawa.ryo@withone.co.jp>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<div class="modal-body">
	<?php echo $this->element('NetCommons.setting_tabs', $settingTabs); ?>

	<div class="tab-content">
		<div class="text-right">
			<a class="btn btn-success" href="<?php echo $this->Html->url('/edumap/blocks/add/' . $frameId);?>">
				<span class="glyphicon glyphicon-plus"> </span>
			</a>
		</div>

		<div id="nc-edumap-setting-<?php echo $frameId; ?>">
			<?php echo $this->Form->create('', array(
					'url' => '/frames/frames/edit/' . $frameId
				)); ?>

				<?php echo $this->Form->hidden('Frame.id', array(
						'value' => $frameId,
					)); ?>

				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>
								<?php echo $this->Paginator->sort('Edumap.name', __d('edumap', 'School name')); ?>
							</th>
							<th>
								<?php echo $this->Paginator->sort('Block.public_type', __d('blocks', 'Publishing setting')); ?>
							</th>
							<th>
								<?php echo $this->Paginator->sort('Edumap.modified', __d('net_commons', 'Updated date')); ?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($edumaps as $edumap) : ?>
							<tr<?php echo ($blockId === $edumap['block']['id'] ? ' class="active"' : ''); ?>>
								<td>
									<?php echo $this->Form->input('Frame.block_id',
										array(
											'type' => 'radio',
											'name' => 'data[Frame][block_id]',
											'options' => array((int)$edumap['block']['id'] => ''),
											'div' => false,
											'legend' => false,
											'label' => false,
											'hiddenField' => false,
											'checked' => (int)$edumap['block']['id'] === (int)$blockId,
											'onclick' => 'submit()'
										)); ?>
								</td>
								<td>
									<a href="<?php echo $this->Html->url('/edumap/blocks/edit/' . $frameId . '/' . (int)$edumap['block']['id']); ?>">
										<?php echo h($edumap['edumap']['name']); ?>
									</a>
								</td>
								<td>
									<?php if ($edumap['block']['publicType'] === '0') : ?>
										<?php echo __d('blocks', 'Private'); ?>
									<?php elseif ($edumap['block']['publicType'] === '1') : ?>
										<?php echo __d('blocks', 'Public'); ?>
									<?php elseif ($edumap['block']['publicType'] === '2') : ?>
										<?php echo __d('blocks', 'Limited'); ?>
									<?php endif; ?>
								</td>
								<td>
									<?php echo $this->Date->dateFormat($edumap['edumap']['modified']); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			<?php echo $this->Form->end(); ?>

			<div class="text-center">
				<?php echo $this->element('NetCommons.paginator', array(
						'url' => Hash::merge(
							array('controller' => 'blocks', 'action' => 'index', $frameId),
							$this->Paginator->params['named']
						)
					)); ?>
			</div>
		</div>
	</div>
</div>




