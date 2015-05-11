<?php
/**
 * input date element
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

$underscoreField = Inflector::underscore($field);
$modelVariable = Inflector::variable($model);

$value = isset(${$modelVariable}[$field]) ? ${$modelVariable}[$field] : '';
$year = isset($value['year']) ? $value['year'] : substr($value, 0, 4);
$month = isset($value['month']) ? $value['month'] : substr($value, 4, 2);
?>

<div class="row form-group">
	<div class="col-xs-12 col-sm-6 col-md-4">

		<?php echo $this->Form->label($model . '.' . $underscoreField, $label); ?>

		<div class="input-group">
			<?php echo $this->Form->year($model . '.' . $underscoreField, null, null, array(
				'value' => $year,
				'label' => false,
				'class' => 'form-control',
				'empty' => '',
			)); ?>

			<span class="input-group-addon edumap-input-group-middel"> <?php echo Edumap::DATE_SEPARATOR ?> </span>

			<?php echo $this->Form->month($model . '.' . $underscoreField, array(
				'value' => $month,
				'label' => false,
				'class' => 'form-control',
				'monthNames' => false,
				'empty' => '',
			)); ?>
		</div>
	</div>
	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => $model,
				'field' => $underscoreField,
			]); ?>
	</div>
</div>


