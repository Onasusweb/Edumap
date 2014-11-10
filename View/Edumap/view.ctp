<?php if ($contentEditable) : ?>
	<div id="nc-edumap-<?php echo (int)$frameId; ?>"
		 ng-controller="Edumap"
		 ng-init="initialize(<?php echo (int)$frameId; ?>,
								<?php echo h(json_encode($edumap)); ?>)">

		<p class="text-right">
			<?php if ($contentPublishable) : ?>
				<button type="button" class="btn btn-warning"
						tooltip="<?php echo __d('net_commons', 'Accept'); ?>"
						ng-controller="Edumap.edit"
						ng-hide="(edumap.Edumap.name !== '<?php echo NetCommonsBlockComponent::STATUS_APPROVED ?>')"
						ng-click="initialize(); save('<?php echo NetCommonsBlockComponent::STATUS_PUBLISHED ?>')">

					<span class="glyphicon glyphicon-ok"></span>
				</button>
			<?php endif; ?>

			<button class="btn btn-primary"
					tooltip="<?php echo __d('net_commons', 'Manage'); ?>"
					ng-click="showManage()">

				<span class="glyphicon glyphicon-cog"> </span>
			</button>
		</p>
	</div>

	<?php echo $this->element('Edumap/edumap'); ?>

<?php else : ?>
学校情報
<?php endif; ?>

