<li class="clearfix">
   <article class="prl-article">
		<a class="prl-thumbnail left" href="<?php echo Articles::model()->getTitleURL($row);?>">
			<div class="prl-overlay">
                <?php echo Articles::model()->getThumListCate($row);?>
			</div>
		</a>
		<div class="prl-article-entry">
			<h2 class="prl-article-title"><a href="<?php echo Articles::model()->getTitleURL($row);?>"><?php echo $row->title;?></a> 
                <?php if($row->hot == '1'):?><span class="prl-badge prl-badge-warning">HOT</span><?php endif;?>
            </h2> 
			<div class="prl-article-meta">
                <i class="fa fa-calendar-o"></i> <?php echo Articles::model()->getDate($row);?>&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
            </div>    
			<p><?php echo CutString($row->short_description,400);?></p>
		</div>
	</article>
</li>

