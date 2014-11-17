<?php

echo $this->Form->create(null);

echo $this->element('EdumapEdit/edumap_form');

echo $this->element('EdumapEdit/radio_button_form');

echo $this->Form->input('EdumapStudent.0.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.1.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.2.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.3.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.4.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.5.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.6.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.7.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.8.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.9.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.10.number',array(
			'type' => 'text',
			'value'=> '',
		)
	);
echo $this->Form->input('EdumapStudent.11.number',array(
			'type' => 'text',
			'value'=> '',
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

