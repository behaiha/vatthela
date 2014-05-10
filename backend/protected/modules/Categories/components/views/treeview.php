<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/libs/treeview/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/libs/treeview/jquery.hotkeys.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/libs/treeview/jquery.jstree.js"></script>
<div id="demo1" class="demo" style="height:100px;">
	<ul>
		<?php foreach($model as $key): ?>
			<?php if($key->parent_id == 0): ?>
				<li >
					<a href="javasrcipt:void(0);" onclick="chaneCaterogies(<?php echo $key->id; ?>,0);"><?php echo $key->title; ?></a>
					<ul>
						<?php foreach($key->children as $value): ?>
							<li>
								<a href="javasrcipt:void(0);" onclick="chaneCaterogies(<?php echo $value->id; ?>,0);"><?php echo $value->title; ?></a>
								<ul>
									<?php foreach($value->children as $k): ?>
										<li>
											<a href="javasrcipt:void(0);" onclick="chaneCaterogies(<?php echo $k->id; ?>,1);"><?php echo $k->title; ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("#demo1").jstree();
	});
	function chaneCaterogies (id,status) {
		$.ajax({
			url: '<?php echo Yii::app()->createUrl("Categories/default/change") ?>',
			type: 'POST',
			data: {parent: id,status:status},
			success:function (data) {
				$('#all_categories').html(data);
			},
		});
	}
</script>