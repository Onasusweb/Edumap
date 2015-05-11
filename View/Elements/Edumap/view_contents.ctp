<?php
/**
 * Element of edumap view content
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<h1>
	<?php echo h($edumap['name']); ?>
</h1>

<?php if (isset($file['urlSmall'])) :?>
	<div class="form-group">
		<?php echo $this->Html->image(h($file['urlSmall']), array(
			'alt' => h($file['name']),
			'class' => 'img-responsive img-thumbnail',
		)); ?>
	</div>
<?php endif; ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'nameKana', 'label' => __d('edumap', 'School name(kana)')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'handle', 'label' => __d('edumap', 'Handle name')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'postalCode', 'label' => __d('edumap', 'Postal code')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'prefectureCode', 'label' => __d('edumap', 'Prefecture')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'location', 'label' => __d('edumap', 'Location')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'tel', 'label' => __d('edumap', 'Phone number')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'fax', 'label' => __d('edumap', 'Fax number')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'emergencyEmail', 'label' => __d('edumap', 'Emergency contact email')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'inquiry', 'label' => __d('edumap', 'Inquiry')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'siteUrl', 'label' => __d('edumap', 'Site URL')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'foundationDate', 'label' => __d('edumap', 'Foundation date')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'closedDate', 'label' => __d('edumap', 'Closed date')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'rssUrl', 'label' => __d('edumap', 'RSS URL')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'governorType', 'label' => __d('edumap', 'Governing body type')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'educationType', 'label' => __d('edumap', 'Education type')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'coeducationType', 'label' => __d('edumap', 'Coeducation')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'principalName', 'label' => __d('edumap', 'Principal name')]); ?>

<?php echo $this->element('Edumap/view_field', ['field' => 'principalEmail', 'label' => __d('edumap', 'Principal email')]); ?>

<?php if ($edumapStudents && isset($edumapVisibilitySetting['studentNumber'])) : ?>
	<?php if ($edumapVisibilitySetting['studentNumber'] === EdumapVisibilitySetting::PUBLIC_VISIBILITY || $contentEditable) : ?>
		<div class="form-group">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<?php echo h(__d('edumap', 'Number of students')); ?>
				</div>
			</div>
			<?php echo $this->element('Edumap/view_students'); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if (isset($edumapSocialMedia[EdumapSocialMedium::SOCIAL_TYPE_TWITTER]) && isset($edumapVisibilitySetting['socialMedia'])) : ?>
	<?php if ($edumapVisibilitySetting['socialMedia'] === EdumapVisibilitySetting::PUBLIC_VISIBILITY || $contentEditable) : ?>
		<div class="row form-group">
			<div class="col-xs-12 col-sm-4">
				<?php echo h(__d('edumap', 'Twitter name')); ?>
			</div>

			<div class="col-xs-12 col-sm-8">
				<?php echo h($edumapSocialMedia[EdumapSocialMedium::SOCIAL_TYPE_TWITTER]); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>


<?php if (isset($edumap['description']) && $edumap['description'] != '' && isset($edumapVisibilitySetting['description'])) : ?>
	<?php if ($edumapVisibilitySetting['description'] === EdumapVisibilitySetting::PUBLIC_VISIBILITY || $contentEditable) : ?>
		<div class="row form-group">
			<div class="col-xs-12">
				<?php echo h(__d('edumap', 'Description')); ?>
			</div>

			<div class="col-xs-12">
				<?php echo h($edumap['description']); ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif;
