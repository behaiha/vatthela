<ul id="filter-buttons">
	<li >
		<a class="a-category-index" href="#" data-filter="*" class="selected">Hiển thị tất cả</a>
		<input type='hidden' class="data-filter" value="0">
	</li>
	
	<?php foreach($model as $value): 
		$filter = '.cate'.$value->id;
	?>
		<li>
			<a class="a-category-index" href="#" data-filter="<?php echo $filter; ?>"><?php echo $value->title; ?></a>
			<input type='hidden' class="data-filter" value="<?php echo $value->id; ?>">
		</li>		
	<?php endforeach; ?>
</ul>
<input type='hidden' id="current-category" value="0">
<script type="text/javascript">
		jQuery('.a-category-index').click(function() {
			var t = $(this);
			var cate = t.parent().find('.data-filter').val();
			$('#current-category').val(cate);
		});

</script>