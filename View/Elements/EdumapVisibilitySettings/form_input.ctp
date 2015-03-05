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

$underscoreField = Inflector::underscore($field);
?>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->label('EdumapVisibilitySetting.' . $underscoreField, $label); ?>

		<div class="edumap_radio">
			<?php echo $this->Edumap->inputVisibilitySetting('EdumapVisibilitySetting.' . $underscoreField, array(
				'value' => isset($edumapVisibilitySetting[$field]) ? $edumapVisibilitySetting[$field] : '0',
				'legend' => false,
				'separator' => '<span class="edumap_radio_separator"> </span>'
			)); ?>
		</div>
	</div>
</div>
