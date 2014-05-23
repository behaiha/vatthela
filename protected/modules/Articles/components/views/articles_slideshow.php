<div id="sliderTab">
	<div id="mainFlexslider" class="slider_content flexslider" >
		<ul class="slides">
            <?php foreach($model as $row):?>
			<li>
			   <article> 
					<div class="slider_title">
						<div class="slider-post-meta">
							<span class="prl-post-rating">
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
							</span> <a href="#"><i class="fa fa-comment-o"></i> 2</a>
						</div>
						<h2><a href="single.php"><?php echo $row->title;?></a></h2>
					</div>
				   <a href="single.php"><?php echo Articles::model()->getImageForSlideShow($row);?></a>
			   </article>
			</li>
            <?php endforeach;?>
				  
		</ul>        
		<script type="text/javascript">
			$(function(){
				$('#mainFlexslider').flexslider({
					animation: "fade",
					prevText: '<i class="fa fa-angle-left icon-large"></i>', 
					nextText: '<i class="fa fa-angle-right icon-large"></i>', 
					manualControls: "#main-slider-control-nav li"
				});
			});
		</script>

	</div>
	<div class="slider_tabs">
		<ul class="tabs" id="main-slider-control-nav">
            <?php foreach($model as $row):?>
			<li><div class="tab_content"><a href="#"><?php echo $row->title;?></a></div></li>
			<?php endforeach;?>
		</ul>
	</div>
	<div class="clear"></div>
</div>
