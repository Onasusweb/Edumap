<?php

echo $this->Form->create(null);

echo $this->Form->input('Edumap.name', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.name_kana', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.handle', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.postal_code', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.prefecture_code', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.location', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.tel', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.fax', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.emergency_email', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.inquiry', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.site_url', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.foundation_date', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.closed_date', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.rss_url', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.governor_type', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.education_type', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.coeducation_type', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.principal_name', array(
			'type' => 'text',
			'value' => '',
		)
	);
echo $this->Form->input('Edumap.principal_email', array(
			'type' => 'text',
			'value' => '',
		)
	);

echo $this->Form->input('Edumap_student.0.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.1.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.2.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.3.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.4.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.5.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.6.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.7.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.8.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.9.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.10.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('Edumap_student.11.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
	
	echo $this->Form->input('Edumap.description', array(
			'type' => 'text',
			'value' => '',
		)
	);
	
	
if ($contentPublishable) {
	$options = array(
		NetCommonsBlockComponent::STATUS_PUBLISHED,
		NetCommonsBlockComponent::STATUS_DRAFTED,
		NetCommonsBlockComponent::STATUS_DISAPPROVED,
	);
} else {
	$options = array(
		NetCommonsBlockComponent::STATUS_APPROVED,
		NetCommonsBlockComponent::STATUS_DRAFTED,
	);
}
echo $this->Form->input('Edumap.status', array(
			'type' => 'select',
			'options' => array_combine($options, $options)
		)
	);
	
echo $this->element('EdumapEdit/common_form');

echo $this->Form->end();

?>

