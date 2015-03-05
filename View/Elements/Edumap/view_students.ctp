<?php
/**
 * edumap edit template
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<?php for ($grade = 1; $grade <= 6; $grade++) : ?>
	<?php if (isset($edumapStudents[$grade])) : ?>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-12 col-sm-3">
				<?php echo h(__d('edumap', $grade . ' grader')); ?>
			</div>

			<div class="col-xs-offset-2 col-xs-12 col-sm-offset-0 col-sm-4">
				<?php if (isset($edumapStudents[$grade][EdumapStudent::GENDAR_MALE])) : ?>
					<?php echo h(sprintf(__d('edumap', 'Male: %d students'), (int)$edumapStudents[$grade][EdumapStudent::GENDAR_MALE])); ?>
				<?php endif; ?>
			</div>

			<div class="col-xs-offset-2 col-xs-12 col-sm-offset-0 col-sm-4">
				<?php if (isset($edumapStudents[$grade][EdumapStudent::GENDAR_FEMALE])) : ?>
					<?php echo h(sprintf(__d('edumap', 'Female: %d students'), (int)$edumapStudents[$grade][EdumapStudent::GENDAR_FEMALE])); ?>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>
<?php endfor;