<?php

App::uses('EdumapAppModel', 'Edumap.Model');

class EdumapVisibilityFrameSetting extends EdumapAppModel {

	public function getEdumapVisibilityFrameSetting() {
		$edumap_visibility_frame_setting = $this->find('first', array(
				'order' => 'EdumapVisibilityFrameSetting.id DESC')
		);

		if (! $edumap_visibility_frame_setting) {
			$edumap_visibility_frame_setting = $this->create();
			$edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['id'] = '0';
			$edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['frame_key'] = '';
		}
		return $edumap_visibility_frame_setting;
	}

	public function saveEdumapVisibilityFrameSetting($postData) {

		//frame_key‚ðŽæ“¾	
		$models = array(
			'Frame' => 'Frames.Frame',
		);
		foreach ($models as $model => $class) {
			$this->$model = ClassRegistry::init($class);
			$this->$model->setDataSource('master');
		}
		$frame = $this->Frame->findById($postData['Frame']['id']);
		$frame_key = $frame['Frame']['key'];	

		//DB‚Ö‚Ì“o˜^
		$dataSource = $this->getDataSource();
		$dataSource->begin();
		try {
			//ƒe[ƒuƒ‹‚É“o˜^
			$edumap_visibility_frame_setting['EdumapVisibilityFrameSetting'] = $postData['EdumapVisibilityFrameSetting'];
			$edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['frame_key'] = $frame_key;
			$edumap_visibility_frame_setting['EdumapVisibilityFrameSetting']['created_user'] = CakeSession::read('Auth.User.id');

			$edumap_visibility_frame_setting = $this->save($edumap_visibility_frame_setting);
			if (! $edumap_visibility_frame_setting) {
				throw new ForbiddenException(serialize($this->validationErrors));
			}

			$dataSource->commit();
			return $edumap_visibility_frame_setting;
			
		} catch (Exception $ex) {
			CakeLog::error($ex->getTraceAsString());
			$dataSource->rollback();
			return false;
		}
	}
}

?>
