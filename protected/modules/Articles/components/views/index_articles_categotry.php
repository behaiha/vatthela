<ul id="filter-buttons">
	<li><a href="#" data-filter="*" class="selected">Hiển thị tất cả</a></li>
	<?php foreach($model as $value): 
		$filter = '.cate'.$value->id;
	?>
		<li><a href="#" data-filter="<?php echo $filter; ?>"><?php echo $value->title; ?></a></li>
	<?php endforeach; ?>
</ul>