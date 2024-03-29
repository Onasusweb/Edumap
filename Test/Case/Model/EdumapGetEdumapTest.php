<?php
/**
 * Test of Edumap->getEdumap()
 *
 * @property Edumap $Edumap
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestBase', 'Edumap.Test/Case/Model');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Test of Edumap->getEdumap()
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapGetEdumapTest extends EdumapModelTestBase {

/**
 * testGetEdumap
 *
 * @return void
 */
	public function testGetEdumap() {
		//$blockId = '121';
		//$roomId = '1';
		//$contentEditable = true;
		//$result = $this->Edumap->getEdumap($blockId, $roomId, $contentEditable);
		//
		//$expected = array(
		//	'Edumap' => array(
		//		'id' => '2',
		//		'block_id' => $blockId,
		//		'status' => WorkflowComponent::STATUS_IN_DRAFT,
		//		'key' => 'edumap_1',
		//	),
		//);
		//
		//$this->_assertArray(null, $expected, $result);
	}

/**
 * testGetEdumapByNoEditable method
 *
 * @return void
 */
	public function testGetEdumapByNoEditable() {
		//$blockId = '121';
		//$roomId = '1';
		//$contentEditable = false;
		//$result = $this->Edumap->getEdumap($blockId, $roomId, $contentEditable);
		//
		//$expected = array(
		//	'Edumap' => array(
		//		'id' => '1',
		//		'block_id' => $blockId,
		//		'status' => WorkflowComponent::STATUS_PUBLISHED,
		//		'key' => 'edumap_1',
		//	),
		//);
		//
		//$this->_assertArray(null, $expected, $result);
	}

}
