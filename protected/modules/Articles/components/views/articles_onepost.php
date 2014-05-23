<div class="prl-span-4">
    <div class="prl-post-content">
        <a href="<?php echo Articles::model()->getTitleURL($row);?>" class="prl-thumbnail">
        <span class="prl-overlay">
             <?php echo Articles::model()->getThumIndex($row);?>
        </span>
        </a>   
        <h3><a href="<?php echo Articles::model()->getTitleURL($row);?>"><?php echo $row->title;?></a> 
            <?php if($row->hot == '1'){?>
                <span class="prl-badge prl-badge-warning">HOT</span><?php }else{
            ?>
                <span class="prl-badge prl-badge-cyan">NEW</span>
            <?php }?>
        </h3> 
        <div class="prl-article-meta">
            <i class="fa fa-calendar-o"></i> <?php echo Articles::model()->getDate($row);?>&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
        </div>    
        <p><?php echo CutString($row->short_description,200);?></p>
        
    </div>
</div>