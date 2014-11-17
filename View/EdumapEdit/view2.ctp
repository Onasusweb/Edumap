<?php echo $this->element('EdumapEdit/tab_header'); ?>

<div class="modal-body">
	<div class="tab-content">
		<div id="nc-edumap-edit-<?php echo $frameId; ?>"
				class="tab-pane active">
			<p>
				<form action="/edumap/edumap_edit/view2/<?php echo $frameId; ?>/"
					  id="EdumapForm2Form<?php echo $frameId; ?>">
					  
					<?php echo $this->element('EdumapEdit/radio_button'); ?>

					<?php echo $this->element('EdumapEdit/common_form'); ?>
				</form>
			</p>

			<?php echo $this->element('EdumapEdit/button2'); ?>
		</div>
	</div>
</div>
