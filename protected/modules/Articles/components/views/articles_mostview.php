<div class="widget widget-recent-post prl-panel">
	<a href="<?php echo Articles::model()->getViewMostURL();?>"><h5 class="prl-block-title">Xem nhiều nhất</h5></a>
	<ul class="prl-list prl-list-line">
        <?php foreach($model as $row):?>
		<li>
			<article class="clearfix">
				<a href="<?php echo Articles::model()->getTitleURL($row);?>" class="prl-thumbnail"><?php echo Articles::model()->getThumbaiSmall($row);?></a>
				<div>
				<h4><a href="<?php echo Articles::model()->getTitleURL($row);?>" title=""><?php echo $row->title;?></a></h4>
				<!--<span class="prl-article-meta prl-clearfix"><i class="fa fa-calendar-o"></i> Nov 13th, 2013</span>-->
				</div>
			</article>
		</li>
		<?php endforeach;?>
	</ul>
</div>	