<?php echo $this->element('EdumapEdit/tab_header'); ?>

<div class="modal-body">
	<div class="tab-content">
		<div id="nc-edumap-edit-<?php echo $frameId; ?>"
				class="tab-pane active">
			<p>
				<form action="/edumap/edumap_edit/view/<?php echo $frameId; ?>/"
					  id="EdumapFormForm<?php echo $frameId; ?>">
					  
					  
						<label style="margin:0% 10%;">学校名</label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.name">
						</div>

						<label style="margin:0% 10%;">学校名(カナ)</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.name_kana">
						</div>

						<label style="margin:0% 10%;">ハンドル</label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.handle">
						</div>

						<label style="margin:0% 10%;">郵便番号</label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.postal_code">
						</div>

						<label style="margin:0% 10%;">都道府県</label>
						<div class="form-group has-error">
							<select required class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.prefecture_code">
								<?php echo $this->element('EdumapEdit/prefecture'); ?>
							</select>
						</div>

						<label style="margin:0% 10%;">所在地</label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.location">
						</div>

						<label style="margin:0% 10%;">電話番号</label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:40%;margin:0% 10%;" ng-model="edit.data.Edumap.tel">
						</div>

						<label style="margin:0% 10%;">FAX番号</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:40%;margin:0% 10%;" ng-model="edit.data.Edumap.fax">
						</div>

						<label style="margin:0% 10%;">緊急連絡先eメール</label>
						<div class="form-group has-error">
							<input type="text" required class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.emergency_email">
						</div>

						<label style="margin:0% 10%;">問い合わせ先</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.inquiry">
						</div>

						<label style="margin:0% 10%;">ホームページ</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.site_url">
						</div>

						<label style="margin:0% 10%;">開校日</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.foundation_date">
						</div>

						<label style="margin:0% 10%;">閉校日</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.closed_date">
						</div>

						<label style="margin:0% 10%;">RSS URL</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.rss_url">
						</div>
						
						<label style="margin:0% 10%;">国公立私立種別</label>
						<div class="form-group">
							<select class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.governor_type">
								<?php echo $this->element('EdumapEdit/governor'); ?>
							</select>
						</div>
						
						<label style="margin:0% 10%;">校種</label>
						<div class="form-group">
							<select class="form-control" style="width:50%;margin:0% 10%;" ng-model="edit.data.Edumap.education_type">
								<?php echo $this->element('EdumapEdit/education'); ?>
							</select>
						</div>

						<label style="margin:0% 10%;">共学・別学</label>
						<div class="form-group">
							<input type="radio" name="coeducation" value="2" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type">男子校
							<input type="radio" name="coeducation" value="3" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type">女子校
							<input type="radio" name="coeducation" value="1" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type">共学
							<input type="radio" name="coeducation" value="0" style="margin:0% 0% 0% 10%;" ng-model="edit.data.Edumap.coeducation_type">未設定
						</div>

						<label style="margin:0% 10%;">学校長名</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.principal_name">
						</div>

						<label style="margin:0% 10%;">校長携帯eメール</label>
						<div class="form-group">
							<input type="text" class="form-control" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.principal_email">
						</div>




						<label style="margin:0% 10%;">生徒数</label>
						<input type="text" placeholder="一年生男子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.0.number">

						<input type="text" placeholder="一年生女子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.1.number">

						<input type="text" placeholder="二年生男子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.2.number">

						<input type="text" placeholder="二年生女子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.3.number">

						<input type="text" placeholder="三年生男子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.4.number">

						<input type="text" placeholder="三年生女子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.5.number">

						<input type="text" placeholder="四年生男子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.6.number">

						<input type="text" placeholder="四年生女子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.7.number">

						<input type="text" placeholder="五年生男子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.8.number">

						<input type="text" placeholder="五年生女子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.9.number">

						<input type="text" placeholder="六年生男子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.10.number">

						<input type="text" placeholder="六年生女子" class="form-control" style="width:30%;margin:0% 10%;" ng-model="edit.data.Edumap_student.11.number">


						<label style="margin:0% 10%;">学校の概要</label>
						<div class="form-group">
							<textarea class="form-control" rows="3" style="width:80%;margin:0% 10%;" ng-model="edit.data.Edumap.description">
							</textarea>
						</div>

		  
					<?php echo $this->element('EdumapEdit/common_form'); ?>
				</form>
			</p>

			<?php echo $this->element('EdumapEdit/button'); ?>
		</div>
	</div>
</div>
