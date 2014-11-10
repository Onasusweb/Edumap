<div id="nc-edumap-<?php echo (int)$frameId; ?>"
	ng-controller="Edumap"
	ng-init="initialize(<?php echo (int)$frameId; ?>,
			<?php echo h(json_encode($edumap)); ?>)">


<p class="text-right">
	<?php echo $this->Html->script(edumap,array('inline'=>false)); ?>
	<button class="btn btn-primary ng-scope" tooltip="管理"
		ng-click="showManage()">

		<span class="glyphicon glyphicon-cog">
	</button>
</p>



















<div class="row" style="padding: 5px 0px;">
	<div class="col-md-3">学校名</div>
	<div class="col-md-9">ｘｘｘｘｘｘｘｘｘｘｘｘｘ学校</div>
</div>

<div class="row" style="padding: 5px 0px;">
  <div class="col-md-3">郵便番号</div>
  <div class="col-md-9">999-9999</div>
</div>

<div class="row" style="padding: 5px 0px;">
  <div class="col-md-3">都道府県</div>
  <div class="col-md-9">東京都</div>
</div>

<div class="row" style="padding: 5px 0px;">
  <div class="col-md-3">所在地</div>
  <div class="col-md-9">千代田区一ツ橋２－１－２</div>
</div>

<div class="row" style="padding: 5px 0px;">
  <div class="col-md-3">電話番号</div>
  <div class="col-md-9">99-9999-9999</div>
</div>
