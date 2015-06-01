<?php
/**
 * input phone element
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */
?>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->label('EdumapStudent.students',
			__d('edumap', 'Number of students')
		); ?>
	</div>

	<?php for ($grade = 1; $grade <= 6; $grade++) : ?>
		<div class="row">
			<div class="col-xs-offset-1 col-xs-12 col-sm-2">
				<b><?php echo $this->element('Edumap/school_grade_label', array('grade' => $grade)); ?></b>
			</div>
			<div class="col-xs-offset-2 col-xs-4 col-sm-offset-0 col-sm-4">
				<?php $index = ($grade - 1) * 2; ?>

				<?php echo $this->Form->hidden('EdumapStudent.' . $index . '.grade', array(
					'value' => $grade,
				)); ?>

				<?php echo $this->Form->hidden('EdumapStudent.' . $index . '.gendar', array(
					'value' => EdumapStudent::GENDAR_MALE,
				)); ?>

				<?php echo $this->Form->label('EdumapStudent.' . $index . '.number',
						__d('edumap', 'Male students')
				); ?>

				<?php echo $this->Form->text(
						'EdumapStudent.' . $index . '.number', array(
							'type' => 'number',
							'min' => 0,
							'max' => 999,
							'class' => 'text-right',
							'value' => (isset($edumapStudents[$grade][EdumapStudent::GENDAR_MALE]) ? (int)$edumapStudents[$grade][EdumapStudent::GENDAR_MALE] : '')
						)
					); ?>
			</div>

			<div class="col-xs-offset-1 col-xs-4 col-sm-offset-0 col-sm-4">
				<?php $index = ($grade - 1) * 2 + 1; ?>

				<?php echo $this->Form->label('EdumapStudent.' . $index . '.number',
						__d('edumap', 'Female students')
				); ?>

				<?php echo $this->Form->hidden('EdumapStudent.' . $index . '.grade', array(
					'value' => $grade,
				)); ?>

				<?php echo $this->Form->hidden('EdumapStudent.' . $index . '.gendar', array(
					'value' => EdumapStudent::GENDAR_FEMALE,
				)); ?>

				<?php echo $this->Form->text(
						'EdumapStudent.' . $index . '.number', array(
							'type' => 'number',
							'min' => 0,
							'max' => 999,
							'class' => 'text-right',
							'value' => (isset($edumapStudents[$grade][EdumapStudent::GENDAR_FEMALE]) ? (int)$edumapStudents[$grade][EdumapStudent::GENDAR_FEMALE] : '')
						)
					); ?>
			</div>
		</div>
	<?php endfor; ?>
</div>