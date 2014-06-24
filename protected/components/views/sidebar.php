<aside id="sidebar" class="prl-span-3">	
	<!--Most recent video-->
    <?php $this->widget('Videos.Components.Videos_MostRecent');?>
    
    <!--Bài viết xem nhiều nhất-->
	<?php $this->widget('Articles.Components.Articles_MostView');?>
    <!--End bài viết xem nhiều nhất-->	
    
    <?php $this->widget('Videos.Components.Videos_MostView');?>
	
	<div id="search-3" class="widget widget_search prl-panel">
		<h5 class="prl-block-title">Search</h5>
		<form role="search" method="post" id="searchform" action="<?php echo Yii::app()->createUrl('/Articles/search/rsearch');?>" class="prl-form" >
			<div><label class="screen-reader-text" for="s">Search for:</label>
			<input type="text" name="keyword" id="s" />
			<input type="submit" id="searchsubmit" value="Search" />
			</div>
		</form>
	</div>


	<div id="facebook-like-widget-2" class="widget facebook-widget prl-panel"><h5 class="prl-block-title">Facebook</h5>
		<div class="fw-wrapper">
		<div class="fw-inner">
		<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fenvato&amp;width=500&amp;colorscheme=light&amp;border_color=white&amp;show_faces=true&amp;stream=false&amp;header=false&amp;height=260" id="facebook-iframe" ></iframe>

		</div>
		</div>
	</div>
</aside>