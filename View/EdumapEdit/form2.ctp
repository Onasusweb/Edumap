<?php

echo $this->Form->create(null);

echo $this->element('EdumapEdit/edumap_form');

echo $this->element('EdumapEdit/radio_button_form');

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


