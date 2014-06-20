<div class="widget prl-panel">
	<script>
		$(function () {
			$("#accordion").jAccordion(); 
		});	
	</script>
	<div id="accordion" class="prl-accordion">
		<section>
			<a href="#acc1" id="acc1" class="head">VIDEO MỚI NHẤT</a>
            <?php foreach($model as $row):?>
			<div class="acc-content">
            
                <iframe width="500" height="281"
                        src="http://www.youtube.com/embed/<?php echo $row->video_id;?>">
                </iframe>
				
				<h5><a href="<?php echo Videos::model()->getURL($row);?>"><?php echo $row->video_title;?></a></h5>
			</div>
            <?php endforeach;?>
		</section>
	</div>
</div>    