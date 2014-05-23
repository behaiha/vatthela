<div class="prl-span-3">
	<article class="prl-article">
		<a class="prl-thumbnail" href="<?php echo Articles::model()->getTitleURL($row);?>">
			<span class="prl-overlay">
				 <span class="prl-overlay">
                 <?php echo Articles::model()->getThumIndex($row);?>
            </span>
		
		</a>
		<h3 class="prl-article-title"><a href="<?php echo Articles::model()->getTitleURL($row);?>"><?php echo $row->title;?></a> 
        <?php if($row->hot == 1):?><span class="prl-badge prl-badge-warning">HOT</span><?php endif;?></h3> 
		<div class="prl-article-meta">
            <i class="fa fa-calendar-o"></i> <?php echo Articles::model()->getDate($row);?>&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
        </div>    
		<p><?php echo CutString($row->short_description,120);?></p>
	</article>
</div>