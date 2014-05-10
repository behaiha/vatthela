<style type="text/css">
.cate-2{
	margin-left: 10px !important;
}

.cate-3{
	margin-left: 20px !important;
}
div#allcategory{
	float: right;
	position: absolute;
	right: 220px;
	top: 270px;
	background: #EFFDFF;
	width: 160px;
	padding: 5px;
}
div#tit-cate{
	background: #298dcd;
	border: 1px solid;
	margin: 2px;
	color:#fff;
	padding: 2px;
}
</style>

<div id="allcategory" class="portlet-title span-5 last">
	<div id="tit-cate">Danh mục</div>
	<?php  foreach ($parents as $key):?>
	<?php if(Categories::model()->checkCategory($key->id,$this->model,$this->type) == 1): ?>
		<input type="checkbox" name="cate[]" class='cate-1' checked value="<?php echo $key->id; ?>">&nbsp;<?php echo $key->title; ?><br>
	<?php else: ?>
		<input type="checkbox" name="cate[]" class='cate-1' value="<?php echo $key->id; ?>">&nbsp;<?php echo $key->title; ?><br>
	<?php endif; ?>
	<?php foreach($key->children as $value): ?>
		<?php if(Categories::model()->checkCategory($value->id,$this->model,$this->type) == 1): ?>
			<input type="checkbox" name="cate[]" checked class='cate-2' value="<?php echo $value->id; ?>">&nbsp;<?php echo $value->title; ?><br>
		<?php else: ?>
			<input type="checkbox" name="cate[]" class='cate-2' value="<?php echo $value->id; ?>">&nbsp;<?php echo $value->title; ?><br>
		<?php endif; ?>
		<?php foreach($value->children as $k): ?>
		<?php if(Categories::model()->checkCategory($k->id,$this->model,$this->type) == 1): ?>
			<input type="checkbox" name="cate[]" class='cate-3' checked value="<?php echo $k->id; ?>">&nbsp;<?php echo $k->title; ?><br>
		<?php else: ?>
			<input type="checkbox" name="cate[]" class='cate-3' value="<?php echo $k->id; ?>">&nbsp;<?php echo $k->title; ?><br>
		<?php endif; ?>
		<?php endforeach; ?>
	<?php endforeach; ?>
	
<?php endforeach; ?>

</div>
<div class="clear"></div>