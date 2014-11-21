<?php
/**
 * announcements manage tab header template element
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<div class="modal-header">
	<button class="close" type="button"
			tooltip="<?php echo __d('net_commons', 'Close'); ?>"
			ng-click="cancel()">
		<span class="glyphicon glyphicon-remove small"></span>
	</button>

	<ul class="nav nav-pills">
		<li class="active"><a href="#" ng-click="showManage('view/')"><?php echo __d('edumap', 'School information edit'); ?></a></li>
		<li class="active"><a href="#" ng-click="showManage('view2/')"><?php echo __d('edumap', 'Change display method'); ?></a></li>
	</ul>
</div>
