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

<div class="has-error">
	<?php if ($this->validationErrors[$model] && isset($this->validationErrors[$model][$field])): ?>
		<?php $messages = Hash::flatten($this->validationErrors[$model][$field]); ?>
		<?php foreach ($messages as $message): ?>
			<div class="help-block">
				<?php echo $message; ?>
			</div>
		<?php endforeach; ?>
	<?php endif; ?>
</div>
