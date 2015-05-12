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

<?php echo $this->Form->hidden('Frame.id', array(
	'value' => $frameId
)); ?>

<?php echo $this->Form->hidden('Block.id', array(
	'value' => $blockId,
)); ?>

<?php echo $this->Form->hidden('Block.key', array(
	'value' => $blockKey,
)); ?>

<?php echo $this->Form->hidden('Block.language_id', array(
		'value' => $languageId,
	)); ?>

<?php echo $this->Form->hidden('Block.room_id', array(
		'value' => $roomId,
	)); ?>

<?php echo $this->Form->hidden('Block.plugin_key', array(
		'value' => $this->params['plugin'],
	)); ?>

<?php echo $this->Form->hidden('Edumap.id', array(
		'value' => isset($edumap['id']) ? (int)$edumap['id'] : null,
	)); ?>

<?php echo $this->Form->hidden('Edumap.block_id', array(
		'value' => $blockId,
	)); ?>

<?php echo $this->Form->hidden('Edumap.key', array(
		'value' => $edumap['key'],
	)); ?>

<?php echo $this->Form->hidden('Edumap.language_id', array(
		'value' => $languageId,
	)); ?>

<?php echo $this->Form->hidden('Edumap.file_id', array(
		'value' => isset($edumap['fileId']) ? $edumap['fileId'] : '',
	)); ?>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->label('Edumap.' . Edumap::AVATAR_INPUT, __d('edumap', 'Avatar')); ?>
	</div>

	<div class="col-xs-12">
		<?php if (isset($file['urlThumbnail'])) :?>
			<?php echo $this->Html->image(h($file['urlThumbnail']), array(
				'alt' => h($file['name']),
				'class' => 'img-responsive img-thumbnail',
			)); ?>

			<?php echo $this->Form->checkbox('DeleteFile.0.File.id', array(
				'value' => $edumap['fileId'],
				//'ng-model' => 'deleteFile'
			)); ?>
			<?php echo $this->Form->label('DeleteFile.0.File.id', __d('edumap', 'Delete file.')); ?>
		<?php endif; ?>

		<?php echo $this->Form->file('Edumap.' . Edumap::AVATAR_INPUT, array(
			'accept' => 'image/*',
			//'ng-disabled' => 'deleteFile'
		)); ?>

		<?php echo $this->Form->hidden(Edumap::AVATAR_INPUT . '.File.status', array(
			'value' => 1
		)); ?>
		<?php echo $this->Form->hidden(Edumap::AVATAR_INPUT . '.File.role_type', array(
			'value' => 'room_file_role'
		)); ?>
		<?php echo $this->Form->hidden(Edumap::AVATAR_INPUT . '.File.path', array(
			'value' => '{ROOT}edumap{DS}' . $roomId . '{DS}'
		)); ?>
		<?php echo $this->Form->hidden(Edumap::AVATAR_INPUT . '.FilesPlugin.plugin_key', array(
			'value' => $this->request->params['plugin']
		)); ?>
		<?php echo $this->Form->hidden(Edumap::AVATAR_INPUT . '.FilesRoom.room_id', array(
			'value' => $roomId
		)); ?>
		<?php echo $this->Form->hidden(Edumap::AVATAR_INPUT . '.FilesUser.user_id', array(
			'value' => $userId
		)); ?>
	</div>

	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => 'Edumap',
				'field' => Edumap::AVATAR_INPUT,
			]); ?>
	</div>
</div>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'name',
			'label' => __d('edumap', 'School name') . $this->element('NetCommons.required'),
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'nameKana',
			'label' => __d('edumap', 'School name(kana)'),
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'handle',
			'label' => __d('edumap', 'Handle name') . $this->element('NetCommons.required'),
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'postalCode',
			'label' => __d('edumap', 'Postal code') . $this->element('NetCommons.required'),
			'attributes' => array(
				'placeholder' => '999-9999',
				'maxlength' => 8
			),
			'colSize' => 'col-xs-12 col-sm-4 col-md-3'
		)
	); ?>

<div class="row form-group">
	<div class="col-xs-12 col-sm-4 col-md-3">
		<?php echo $this->Form->label('Edumap.prefecture_code',
			__d('edumap', 'Prefecture') . $this->element('NetCommons.required')
		); ?>

		<?php
			$options = array('' => __d('edumap', 'Not set'));
			for ($i = 1; $i <= 47; $i++) {
				$prefecturCode = sprintf('%02d', $i);
				$options[$prefecturCode] = $this->Edumap->getPrefectureText($prefecturCode);
			}
			echo $this->Form->select('Edumap.prefecture_code', $options, array(
				'value' => isset($edumap['prefectureCode']) ? $edumap['prefectureCode'] : '',
				'class' => 'form-control'
			));
		?>
	</div>
	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => 'Edumap',
				'field' => 'prefecture_code',
			]); ?>
	</div>
</div>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'location',
			'label' => __d('edumap', 'Location') . $this->element('NetCommons.required'),
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'tel',
			'label' => __d('edumap', 'Phone number') . $this->element('NetCommons.required'),
			'attributes' => array(
				'placeholder' => '09-9999-9999',
				'maxlength' => 14
			),
			'colSize' => 'col-xs-12 col-sm-6 col-md-4'
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'fax',
			'label' => __d('edumap', 'Fax number'),
			'attributes' => array(
				'placeholder' => '09-9999-9999',
				'maxlength' => 14
			),
			'colSize' => 'col-xs-12 col-sm-6 col-md-4'
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'emergencyEmail',
			'label' => __d('edumap', 'Emergency contact email') . $this->element('NetCommons.required'),
			'attributes' => array(
				'placeholder' => 'username@example.com'
			),
			'colSize' => 'col-xs-12 col-sm-10 col-md-8'
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'inquiry',
			'label' => __d('edumap', 'Inquiry'),
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'siteUrl',
			'label' => __d('edumap', 'Site URL'),
			'attributes' => array(
				'placeholder' => 'http://www.example.com/'
			)
		)
	); ?>

<?php echo $this->element('Edumap/input_date', array(
			'model' => 'Edumap',
			'field' => 'foundationDate',
			'label' => __d('edumap', 'Foundation date'),
			'default' => date('Y04'),
		)
	); ?>

<?php echo $this->element('Edumap/input_date', array(
			'model' => 'Edumap',
			'field' => 'closedDate',
			'label' => __d('edumap', 'Closed date'),
			'default' => '',
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'rssUrl',
			'label' => __d('edumap', 'RSS URL'),
			'attributes' => array(
				'placeholder' => 'http://www.example.com/rss.xml',
			)
		)
	); ?>

<div class="row form-group">
	<div class="col-xs-12 col-sm-4 col-md-3">
		<?php echo $this->Form->label('Edumap.governor_type',
			__d('edumap', 'Governing body type')
		); ?>

		<?php
			$options = array(
				'0' => __d('edumap', 'Not set'),
				'1' => $this->Edumap->getGovernorTypeText('1'),
				'2' => $this->Edumap->getGovernorTypeText('2'),
				'3' => $this->Edumap->getGovernorTypeText('3'),
				'4' => $this->Edumap->getGovernorTypeText('4'),
				'5' => $this->Edumap->getGovernorTypeText('5'),
				'6' => $this->Edumap->getGovernorTypeText('6'),
				'9' => $this->Edumap->getGovernorTypeText('9'),
			);

			echo $this->Form->select('Edumap.governor_type', $options, array(
				'value' => isset($edumap['governorType']) ? $edumap['governorType'] : '',
				'class' => 'form-control',
				'empty' => false,
			));
		?>

	</div>

	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => 'Edumap',
				'field' => 'governor_type',
			]); ?>
	</div>
</div>

<div class="row form-group">
	<div class="col-xs-12 col-sm-4 col-md-3">
		<?php echo $this->Form->label('Edumap.education_type',
			__d('edumap', 'Education type')
		); ?>

		<?php
			$options = array(
				'0' => __d('edumap', 'Not set'),
				'1' => $this->Edumap->getEducationTypeText('1'),
				'2' => $this->Edumap->getEducationTypeText('2'),
				'3' => $this->Edumap->getEducationTypeText('3'),
				'4' => $this->Edumap->getEducationTypeText('4'),
				'9' => $this->Edumap->getEducationTypeText('9'),
			);

			echo $this->Form->select('Edumap.education_type', $options, array(
				'value' => isset($edumap['educationType']) ? $edumap['educationType'] : '',
				'class' => 'form-control',
				'empty' => false,
			));
		?>
	</div>

	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => 'Edumap',
				'field' => 'education_type',
			]); ?>
	</div>
</div>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->label('Edumap.coeducation_type',
			__d('edumap', 'Coeducation')
		); ?>
	</div>
	<div class="col-xs-12">
		<?php
			$options = array(
				'0' => __d('edumap', 'Not set'),
				'1' => $this->Edumap->getCoeducationTypeText('1'),
				'2' => $this->Edumap->getCoeducationTypeText('2'),
				'3' => $this->Edumap->getCoeducationTypeText('3'),
			);

			echo $this->Form->radio('Edumap.coeducation_type', $options, array(
				'value' => isset($edumap['coeducationType']) ? $edumap['coeducationType'] : '',
				'legend' => false,
				'separator' => '<span class="edumap_radio_separator"> </span>'
			));
		?>
	</div>

	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => 'Edumap',
				'field' => 'coeducation_type',
			]); ?>
	</div>
</div>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'principalName',
			'label' => __d('edumap', 'Principal name'),
		)
	); ?>

<?php echo $this->element('Edumap/input_field', array(
			'model' => 'Edumap',
			'field' => 'principalEmail',
			'label' => __d('edumap', 'Principal email'),
			'attributes' => array(
				'placeholder' => 'username@example.com'
			),
			'colSize' => 'col-xs-12 col-sm-10 col-md-8'
		)
	); ?>

<?php echo $this->element('Edumap/input_students'); ?>

<?php echo $this->element('Edumap/input_social_media'); ?>

<div class="row form-group">
	<div class="col-xs-12">
		<?php echo $this->Form->input('Edumap.description', array(
			'label' => __d('edumap', 'Description'),
			'error' => false,
			'value' => isset($edumap['description']) ? $edumap['description'] : '',
			'class' => 'form-control'
		)); ?>
	</div>

	<div class="col-xs-12">
		<?php echo $this->element(
			'NetCommons.errors', [
				'errors' => $this->validationErrors,
				'model' => 'Edumap',
				'field' => 'description',
			]); ?>
	</div>
</div>
