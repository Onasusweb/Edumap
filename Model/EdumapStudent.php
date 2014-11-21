<?php

App::uses('EdumapAppModel', 'Edumap.Model');

class EdumapStudent extends EdumapAppModel {
	var $name = 'EdumapStudent';


	
	public function getEdumapStudent($edumap_key) {
		for( $i=0 ; $i<12 ; $i++) {
			$conditions = array(
				'edumap_key' => $edumap_key,
				'gendar' => $i%2,
				'grade' => floor($i/2+1),
			);
			$number = $this->find('first', array(
					'conditions' => $conditions,
					'order' => 'EdumapStudent.id DESC',
				)
			);
			
			if($number) {
				$edumap_student['EdumapStudent'][$i] = $number['EdumapStudent'];
			} else {
				$edumap_student['EdumapStudent'][$i]['number'] = 0;
			}
		}
		return $edumap_student;
	}
}

?>

