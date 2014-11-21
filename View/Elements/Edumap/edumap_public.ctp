<?php if (isset($edumap['Edumap']['name'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['name'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'School name'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['name']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['name_kana'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['name_kana'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'School name(katakana)'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['name_kana']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['handle'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['handle'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Handle name'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['handle']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

	<?php if (isset($edumap['Edumap']['postal_code'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['postal_code'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Postal code'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['postal_code']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['location'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['location'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Location'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['location']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['tel'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['tel'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Phone number'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['tel']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

	<?php if (isset($edumap['Edumap']['fax'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['fax'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Fax number'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['fax']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['emergency_email'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['emergency_email'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Emergency contact email'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['emergency_email']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['inquiry'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['inquiry'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Inquiry'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['inquiry']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['site_url'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['site_url'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Website'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['site_url']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['foundation_date'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['foundation_date'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Opened date'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['foundation_date']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['closed_date'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['closed_date'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Closed date'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['closed_date']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['rss_url'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['rss_url'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'RSS URL'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['rss_url']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_selected['governor_type'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['governor_type'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Public and Private type'); ?></div>
			<div class="col-md-9"><?php echo $edumap_selected['governor_type']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_selected['education_type'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['education_type'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Kind of school'); ?></div>
			<div class="col-md-9"><?php echo $edumap_selected['education_type']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_selected['coeducation_type'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['coeducation_type'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Coeducation'); ?></div>
			<div class="col-md-9"><?php echo $edumap_selected['coeducation_type']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['principal_name'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['principal_name'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Principal name'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['principal_name']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['principal_email'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['principal_email'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Principal e-mail'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['principal_email']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['0']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['0']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '1st grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['0']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['1']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['1']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '1st grade girls'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['1']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['2']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['2']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '2nd grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['2']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['3']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['3']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '2nd grade girls'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['3']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['4']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['4']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '3rd grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['4']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['5']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['5']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '3rd grade girls'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['5']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['6']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['6']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '4th grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['6']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['7']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['7']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '4th grade girls'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['7']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['8']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['8']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '5th grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['8']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['9']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['9']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '5th grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['9']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['10']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['10']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '6th grade boys'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['10']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_student['EdumapStudent']['11']['number'])) : ?>
	<?php if ($edumap_student['EdumapStudent']['11']['number'] !== 0) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', '6th grade girls'); ?></div>
			<div class="col-md-9"><?php echo $edumap_student['EdumapStudent']['11']['number']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap['Edumap']['description'])) : ?>
	<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['description'] == 1) : ?>
		<div class="row" style="padding: 5px 0px;">
			<div class="col-md-3"><?php echo __d('edumap', 'Summary'); ?></div>
			<div class="col-md-9"><?php echo $edumap['Edumap']['description']; ?></div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumap_social_media['EdumapSocialMedium']['value'])) : ?>
	<?php if ($edumap_social_media['EdumapSocialMedium']['value'] != '') : ?>
		<?php if ($edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['social_media'] == 1) : ?>
			<div class="row" style="padding: 5px 0px;">
				<div class="col-md-3"><?php echo __d('edumap', 'Twitter name'); ?></div>
				<div class="col-md-9"><?php echo $edumap_social_media['EdumapSocialMedium']['value']; ?></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>




