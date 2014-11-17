<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['name'] == 1) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校名</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['name']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['name'] == 1) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校名(カナ)</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['name_kana']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['handle'] == 1) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">ハンドル</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['handle']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['postal_code'] == 1) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">郵便番号</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['postal_code']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['location'] == 1) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">所在地</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['location']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['tel'] == 1) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">電話番号</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['tel']; ?></div>
	</div>
<?php endif; ?>

