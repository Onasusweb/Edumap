<?php
/**
 * Edumap Model Test Case
 *
 * @property Edumap $Edumap
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('EdumapModelTestCase', 'Edumap.Test/Case/Model');

/**
 * Edumap Model Test Case
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Edumap\Test\Case\Model
 */
class EdumapErrorTest extends EdumapModelTestCase {

/**
 * Expect Edumap->saveEdumap() to validate frames.id and throw exception on error
 *
 * @return void
 */
	public function testSaveEdumapByUnknownFrameId() {
		$this->setExpectedException('InternalErrorException');

		$frameId = 10;
		$blockId = 1;

		//データ生成
		$data = array(
			'Frame' => array('id' => $frameId),
			'Block' => array('id' => $blockId),
			'Edumap' => array(
				'block_id' => $blockId,
				'key' => 'edumap_1',
				'status' => NetCommonsBlockComponent::STATUS_APPROVED,
				'file_id' => 0,
				'name' => 'Edit name',
				'name_kana' => 'Edit name_kana',
				'handle' => 'Edit handle',
				'postal_code' => '123-4567',
				'prefecture_code' => '01',
				'location' => 'Edit location',
				'tel' => '01-2345-6789',
				'fax' => '09-8765-4321',
				'emergency_email' => 'emergency@example.com',
				'inquiry' => 'Edit inquiry',
				'site_url' => 'http://site.example.com',
				'rss_url' => 'http://rss.example.com',
				'foundation_date' => '1945/12',
				'closed_date' => '2015/04',
				'governor_type' => '3',
				'education_type' => '4',
				'coeducation_type' => '2',
				'principal_name' => 'Edit principal_name',
				'principal_email' => 'principal@example.com',
				'description' => 'Edit description',
				'is_auto_translated' => true,
				'translation_engine' => 'Edit translation_engine',
			),
			'EdumapSocialMedium' => array(
				EdumapSocialMedium::SOCIAL_TYPE_TWITTER => array(
					'value' => 'EditTwitterValue',
					'type' => EdumapSocialMedium::SOCIAL_TYPE_TWITTER
				)
			),
			'EdumapStudent' => array(
				array('grade' => '2', 'gendar' => false, 'number' => '123'),
				array('grade' => '2', 'gendar' => true, 'number' => '456'),
				array('grade' => '3', 'gendar' => false, 'number' => '789'),
				array('grade' => '4', 'gendar' => true, 'number' => '654'),
			),
			'Comment' => array('comment' => 'Edit comment'),
		);

		//登録処理実行
		$this->Edumap->saveEdumap($data);
	}

}
