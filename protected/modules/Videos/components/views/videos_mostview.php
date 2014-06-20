<div class="widget widget-recent-post prl-panel">
	<a href="#"><h5 class="prl-block-title">Videos xem nhiều nhất</h5></a>
	<ul class="prl-list prl-list-line">
        <?php foreach($model as $row):?>
		<li>
			<article class="clearfix">
				<a href="<?php echo Videos::model()->getURL($row);?>" class="prl-thumbnail"><?php echo Videos::model()->getThumbaiSmall($row);?></a>
				<div>
				<h4><a href="<?php echo Videos::model()->getURL($row);?>" title=""><?php echo $row->video_title;?></a></h4>
				<!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
				</div>
			</article>
		</li>
		<?php endforeach;?>
	</ul>
</div>	