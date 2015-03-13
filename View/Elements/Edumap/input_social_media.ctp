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

if (isset($edumapSocialMedium[EdumapSocialMedium::SOCIAL_TYPE_TWITTER])) {
	$value = $edumapSocialMedium[EdumapSocialMedium::SOCIAL_TYPE_TWITTER];
} else {
	$value = '';
}

?>

<div class="row form-group">
	<div class="col-xs-12 col-sm-4 col-md-3">
		<?php echo $this->Form->input(
				'EdumapSocialMedium.' . EdumapSocialMedium::SOCIAL_TYPE_TWITTER . '.value', array(
					'label' => __d('edumap', 'Twitter name'),
					'error' => false,
					'class' => 'form-control',
					'value' => (is_array($value) ? $value['value']: $value),
					'maxlength' => 15,
					'size' => 15
				)
			); ?>

			<?php echo $this->Form->hidden('EdumapSocialMedium.' . EdumapSocialMedium::SOCIAL_TYPE_TWITTER . '.type', array(
				'value' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER,
			)); ?>
	</div>
	<div class="col-xs-12">
		<?php echo $this->element(
			'Edumap.error', [
				'errors' => $this->validationErrors['EdumapSocialMedium'],
				'model' => 'twitter',
				'field' => 'value',
			]); ?>
	</div>
</div>
