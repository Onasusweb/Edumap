<?php echo $this->element('EdumapEdit/tab_header'); ?>

<div class="modal-body">
	<div class="tab-content">
		<div id="nc-edumap-edit-<?php echo $frameId; ?>"
				class="tab-pane active">
			<p>
				<form action="/edumap/edumap_edit/view/<?php echo $frameId; ?>/"
					  id="EdumapFormForm<?php echo $frameId; ?>">
					  
					  
						<label style="margin:0% 10%;"><?php echo __d('edumap', 'School name'); ?></label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.name">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'School name(katakana)'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.name_kana">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Handle name'); ?></label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.handle">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Postal code'); ?></label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.postal_code" size=7>
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Prefectures'); ?></label>
						<div class="form-group has-error">
							<select required class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.prefecture_code">
								<?php echo $this->element('EdumapEdit/prefecture'); ?>
							</select>
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Location'); ?></label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.location">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Phone number'); ?></label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:40%;margin:0% 10%;" ng-model="edit.data.Edumap.tel">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Fax number'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:40%;margin:0% 10%;" ng-model="edit.data.Edumap.fax">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Emergency contact email'); ?></label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.emergency_email">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Inquiry'); ?>)</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.inquiry">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Website'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.site_url">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Opened date'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.foundation_date">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Closed date'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.closed_date">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'RSS URL'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.rss_url">
						</div>
						
						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Public and Private type'); ?></label>
						<div class="form-group">
							<select class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.governor_type">
								<?php echo $this->element('EdumapEdit/governor'); ?>
							</select>
						</div>
						
						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Kind of school'); ?></label>
						<div class="form-group">
							<select class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.education_type">
								<?php echo $this->element('EdumapEdit/education'); ?>
							</select>
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Coeducation'); ?></label>
						<div class="form-group">
							<input type="radio" name="coeducation" value="2" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type"><?php echo __d('edumap', 'Boys school'); ?>
							<input type="radio" name="coeducation" value="3" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type"><?php echo __d('edumap', 'Girls school'); ?>
							<input type="radio" name="coeducation" value="1" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type"><?php echo __d('edumap', 'Coeducation school'); ?>
							<input type="radio" name="coeducation" value="0" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type"><?php echo __d('edumap', 'Not set'); ?>
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Principal name'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.principal_name">
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Principal e-mail'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.principal_email">
						</div>




						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Number of students'); ?></label>
						<div class="form-group" style="margin:0% 10%;">
							<div class="row">
								<input type="text" placeholder="<?php echo __d('edumap', '1st grade boys'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.0.number" ng-init="edit.data.EdumapStudent.0.number = <?php echo $edumap_student['EdumapStudent']['0']['number']; ?>">
								<input type="text" placeholder="<?php echo __d('edumap', '1st grade girls'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.1.number" ng-init="edit.data.EdumapStudent.1.number = <?php echo $edumap_student['EdumapStudent']['1']['number']; ?>">
							</div>

							<div class="row">
								<input type="text" placeholder="<?php echo __d('edumap', '2nd grade boys'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.2.number" ng-init="edit.data.EdumapStudent.2.number = <?php echo $edumap_student['EdumapStudent']['2']['number']; ?>">
								<input type="text" placeholder="<?php echo __d('edumap', '2nd grade girls'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.3.number" ng-init="edit.data.EdumapStudent.3.number = <?php echo $edumap_student['EdumapStudent']['3']['number']; ?>">
							</div>

							<div class="row">
								<input type="text" placeholder="<?php echo __d('edumap', '3rd grade boys'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.4.number" ng-init="edit.data.EdumapStudent.4.number = <?php echo $edumap_student['EdumapStudent']['4']['number']; ?>">
								<input type="text" placeholder="<?php echo __d('edumap', '3rd grade girls'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.5.number" ng-init="edit.data.EdumapStudent.5.number = <?php echo $edumap_student['EdumapStudent']['5']['number']; ?>">
							</div>

							<div class="row">
								<input type="text" placeholder="<?php echo __d('edumap', '4th grade boys'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.6.number" ng-init="edit.data.EdumapStudent.6.number = <?php echo $edumap_student['EdumapStudent']['6']['number']; ?>">
								<input type="text" placeholder="<?php echo __d('edumap', '4th grade girls'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.7.number" ng-init="edit.data.EdumapStudent.7.number = <?php echo $edumap_student['EdumapStudent']['7']['number']; ?>">
							</div>

							<div class="row">
								<input type="text" placeholder="<?php echo __d('edumap', '5th grade boys'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.8.number" ng-init="edit.data.EdumapStudent.8.number = <?php echo $edumap_student['EdumapStudent']['8']['number']; ?>">
								<input type="text" placeholder="<?php echo __d('edumap', '5th grade girls'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.9.number" ng-init="edit.data.EdumapStudent.9.number = <?php echo $edumap_student['EdumapStudent']['9']['number']; ?>">
							</div>

							<div class="row">
								<input type="text" placeholder="<?php echo __d('edumap', '6th grade boys'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.10.number" ng-init="edit.data.EdumapStudent.10.number = <?php echo $edumap_student['EdumapStudent']['10']['number']; ?>">
								<input type="text" placeholder="<?php echo __d('edumap', '6th grade girls'); ?>" class="form-control col-lg-5" style="width:30%;margin:1% 1% 1% 1%;"
										ng-model="edit.data.EdumapStudent.11.number" ng-init="edit.data.EdumapStudent.11.number = <?php echo $edumap_student['EdumapStudent']['11']['number']; ?>">
							</div>
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Summary'); ?></label>
						<div class="form-group">
							<textarea class="form-control" rows="3" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.description">
							</textarea>
						</div>

						<label style="margin:0% 10%;"><?php echo __d('edumap', 'Twitter name'); ?></label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.EdumapSocialMedium.value">
						</div>

  
					<?php echo $this->element('EdumapEdit/common_form'); ?>
				</form>
			</p>

			<?php echo $this->element('EdumapEdit/button'); ?>
		</div>
	</div>
</div>
