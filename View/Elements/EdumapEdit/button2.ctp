<p class="text-center">
	<button type="button" class="btn btn-default" ng-click="cancel()" ng-disabled="sending">
		<span class="glyphicon glyphicon-remove"></span>
		<?php echo __d('net_commons', 'Cancel'); ?>
	</button>
	
	<?php if ($contentPublishable) : ?>
		<button type="button" class="btn btn-primary" ng-disabled="sending"
				ng-click="save_radio_button('<?php echo NetCommonsBlockComponent::STATUS_PUBLISHED ?>')">
			<?php echo __d('edumap', 'Activation'); ?>
		</button>

	<?php else : ?>
		<button type="button" class="btn btn-primary" ng-disabled="sending"
				ng-click="save_radio_button('<?php echo NetCommonsBlockComponent::STATUS_APPROVED ?>')">
			<?php echo __d('edumap', 'Activation'); ?>
		</button>

	<?php endif; ?>

</p>
