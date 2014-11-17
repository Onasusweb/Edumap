<p class="text-center">
	<button type="button" class="btn btn-default" ng-click="cancel()" ng-disabled="sending">
		<span class="glyphicon glyphicon-remove"></span>
		<?php echo __d('net_commons', 'Cancel'); ?>
	</button>
	
	<?php if ($contentPublishable) : ?>
		<button type="button" class="btn btn-primary" ng-disabled="sending"
				ng-click="save_radio_button('<?php echo NetCommonsBlockComponent::STATUS_PUBLISHED ?>')">
			設定する
		</button>

	<?php else : ?>
		<button type="button" class="btn btn-primary" ng-disabled="sending"
				ng-click="save_radio_button('<?php echo NetCommonsBlockComponent::STATUS_APPROVED ?>')">
			設定する
		</button>

	<?php endif; ?>

</p>
