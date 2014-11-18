<?php

App::uses('EdumapAppModel', 'Edumap.Model');

class EdumapSocialMedium extends EdumapAppModel {
	var $name = 'EdumapSocialMedium';
	
	
	public function getEdumapSocialMedium($edumap_key) {
		$conditions = array(
			'edumap_key' => $edumap_key,
		);

		$edumap_social_media = $this->find('first', array(
				'conditions' => $conditions,
				'order' => 'EdumapSocialMedium.id DESC')
		);

		if (! $edumap_social_media) {
			$edumap_social_media = $this->create();
			$edumap_social_media['EdumapSocialMedium']['value'] = '';
		}
		return $edumap_social_media;
	}
}

?>

