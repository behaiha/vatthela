<p class="prl-article-tags">
    <span class="prl-article-tags-header">TAGS:</span>
    <?php foreach($model->tags as $tag):?>
    <a href="<?php echo Tags::model()->getTagLink($tag->tag_id);?>"><?php echo Tags::model()->getTagName($tag->tag_id);?></a>, 
    <?php endforeach;?>   
</p>
    
    
    
