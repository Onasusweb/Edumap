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

<?php
$value = isset($edumap[$field]) ? $edumap[$field] : '';

switch ($field) {
	case 'prefectureCode':
		$value = $this->Edumap->getPrefectureText($value);
		break;
	case 'governorType':
		$value = $this->Edumap->getGovernorTypeText($value);
		break;
	case 'educationType':
		$value = $this->Edumap->getEducationTypeText($value);
		break;
	case 'coeducationType':
		$value = $this->Edumap->getCoeducationTypeText($value);
		break;
	case 'foundationDate':
	case 'closedDate':
		$value = $value ? substr($value, 0, 4) . Edumap::DATE_SEPARATOR . substr($value, 4, 2) : '';
		break;
}
?>

<?php if ($value !== '' && isset($edumapVisibilitySetting[$field])) : ?>
	<?php if ($edumapVisibilitySetting[$field] === EdumapVisibilitySetting::PUBLIC_VISIBILITY || $contentEditable) : ?>
		<div class="row form-group">
			<?php if (isset($label)) : ?>
				<div class="col-xs-12 col-sm-4">
					<?php echo h($label); ?>
				</div>

				<div class="col-xs-12 col-sm-8 col-md-8">
					<?php echo h($value); ?>
				</div>
			<?php else : ?>
				<div class="col-xs-12">
					<?php echo h($value); ?>
				</div>
			<?php endif; ?>
		</div>
	<?php endif; ?>
<?php endif;
