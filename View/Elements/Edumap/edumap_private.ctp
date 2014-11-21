<?php if ($edumap['Edumap']['name'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'School name'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['name']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['name_kana'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'School name(katakana)'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['name_kana']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['handle'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Handle name'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['handle']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['postal_code'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Postal code'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['postal_code']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap_selected['prefecture'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Prefectures'); ?></div>
		<div class="col-md-9"><?php echo $edumap_selected['prefecture']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['location'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Location'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['location']; ?></div>
	</div>
<?php endif; ?>
	
<?php if ($edumap['Edumap']['tel'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Phone number'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['tel']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['fax'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Fax number'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['fax']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['emergency_email'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Emergency contact email'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['emergency_email']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['inquiry'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Inquiry'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['inquiry']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['site_url'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Website'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['site_url']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['foundation_date'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Opened date'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['foundation_date']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['closed_date'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Closed date'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['closed_date']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['rss_url'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'RSS URL'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['rss_url']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_selected['governor_type'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Public and Private type'); ?></div>
		<div class="col-md-9"><?php echo $edumap_selected['governor_type']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_selected['education_type'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Kind of school'); ?></div>
		<div class="col-md-9"><?php echo $edumap_selected['education_type']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_selected['coeducation_type'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Coeducation'); ?></div>
		<div class="col-md-9"><?php echo $edumap_selected['coeducation_type']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['principal_name'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Principal name'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['principal_name']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['principal_email'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Principal e-mail'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['principal_email']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['0']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '1st grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['0']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['1']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '1st grade girls'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['1']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['2']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '2nd grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['2']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['3']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '2nd grade girls'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['3']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['4']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '3rd grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['4']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['5']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '3rd grade girls'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['5']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['6']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '4th grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['6']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['7']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '4th grade girls'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['7']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['8']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '5th grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['8']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['9']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '5th grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['9']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['10']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '6th grade boys'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['10']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_student['EdumapStudent']['11']['number'] !== 0) : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', '6th grade girls'); ?></div>
		<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['11']['number']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap['Edumap']['description'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Summary'); ?></div>
		<div class="col-md-9"><?php echo $edumap['Edumap']['description']; ?></div>
	</div>
<?php endif; ?>

<?php if ($edumap_social_media['EdumapSocialMedium']['value'] !== '') : ?>
	<div class="row" style="padding: 5px 0px;">
		<div class="col-md-3"><?php echo __d('edumap', 'Twitter name'); ?></div>
		<div class="col-md-9"><?php echo $edumap_social_media['EdumapSocialMedium']['value']; ?></div>
	</div>
<?php endif; ?>


