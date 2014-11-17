<?php
/**
 * status label template elements
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php $status = NetCommonsBlockComponent::STATUS_APPROVED ?>
<span class="label label-warning <?php echo ($edumap['Edumap']['status'] === $status ? 'ng-show' : 'ng-hide'); ?>"
		ng-class="(edumap.Edumap.status === '<?php echo $status; ?>') ? 'ng-show' : 'ng-hide'">
	<?php echo __d('net_commons', 'Approving'); ?>
</span>

<?php $status = NetCommonsBlockComponent::STATUS_DISAPPROVED ?>
<span class="label label-danger <?php echo ($edumap['Edumap']['status'] === $status ? 'ng-show' : 'ng-hide'); ?>"
		ng-class="(edumap.Edumap.status === '<?php echo $status; ?>') ? 'ng-show' : 'ng-hide'">
	<?php echo __d('net_commons', 'Disapproving'); ?>
</span>

<?php $status = NetCommonsBlockComponent::STATUS_DRAFTED ?>
<span class="label label-info <?php echo ($edumap['Edumap']['status'] === $status ? 'ng-show' : 'ng-hide'); ?>"
		ng-class="(edumap.Edumap.status === '<?php echo $status; ?>') ? 'ng-show' : 'ng-hide'">
	<?php echo __d('net_commons', 'Temporary'); ?>
</span>
