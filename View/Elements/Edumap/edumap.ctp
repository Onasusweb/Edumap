<?php if ($edumap['Edumap']['id'] != '0') : ?>

<?php if ($edumap['Edumap']['name'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校名</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['name']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['name_kana'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校名(カナ)</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['name_kana']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['handle'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">ハンドル</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['handle']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['postal_code'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">郵便番号</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['postal_code']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['location'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">所在地</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['location']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['tel'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">電話番号</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['tel']; ?></div>
	</div>
<?php endif; ?>

<?php endif; ?>
