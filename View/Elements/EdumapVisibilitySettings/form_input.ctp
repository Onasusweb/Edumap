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
$attributes = isset($attributes) ? $attributes : array();
?>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->label('EdumapVisibilitySetting.' . $underscoreField, $label); ?>

		<div class="edumap_radio">
			<?php
				echo $this->Form->radio(
					'EdumapVisibilitySetting.' . $underscoreField,
					array(
						'0' => $this->Edumap->getVisibilitySettingText('0'),
						'1' => $this->Edumap->getVisibilitySettingText('1'),
						'2' => $this->Edumap->getVisibilitySettingText('2'),
					),
					Hash::merge(
						array(
							'value' => isset($edumapVisibilitySetting[$field]) ? $edumapVisibilitySetting[$field] : '0',
							'legend' => false,
							'separator' => '<span class="edumap_radio_separator"> </span>'
						),
						$attributes
					)
				);
			?>
		</div>
	</div>
</div>
