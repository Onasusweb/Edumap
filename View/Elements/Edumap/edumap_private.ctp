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
	
<?php if ($edumap_selected['prefecture'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">都道府県</div>
		<div class="col-md-9"><?php echo $edumap_selected['prefecture']; ?></div>
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

<?php if ($edumap['Edumap']['fax'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">FAX番号</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['fax']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['emergency_email'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">緊急連絡先eメール</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['emergency_email']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['inquiry'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">問い合わせ先</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['inquiry']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['site_url'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">ホームページ</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['site_url']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['foundation_date'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">開校日</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['foundation_date']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['closed_date'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">閉校日</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['closed_date']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['rss_url'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">RSS URL</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['rss_url']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_selected['governor_type'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">国公立種別</div>
		<div class="col-md-9"><?php echo $edumap_selected['governor_type']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_selected['education_type'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">校種</div>
		<div class="col-md-9"><?php echo $edumap_selected['education_type']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_selected['coeducation_type'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">共学・別学</div>
		<div class="col-md-9"><?php echo $edumap_selected['coeducation_type']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['principal_name'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校長名</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['principal_name']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['principal_email'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">校長携帯eメール</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['principal_email']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['0']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">一年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['0']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['1']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">一年生女子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['1']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['2']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">二年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['2']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['3']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">二年生女子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['3']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['4']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">三年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['4']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['5']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">三年生女子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['5']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['6']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">四年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['6']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['7']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">四年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['7']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['8']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">五年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['8']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['9']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">五年生女子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['9']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['10']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">六年生男子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['10']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['11']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">六年生女子</div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['11']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['description'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校の概要</div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['description']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_social_media['EdumapSocialMedium']['value'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3">学校長名</div>
		<div class="col-md-9"><?php echo $edumap_social_media['EdumapSocialMedium']['value']; ?></div>
	</div>
<?php endif; ?>


