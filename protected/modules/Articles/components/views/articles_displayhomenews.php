<div class="prl-panel">
	<h5 class="prl-block-title alizarin"><?php echo $model->title;?>  <span class="prl-block-title-link right"><a href="<?php echo Categories::model()->getURL($model);?>">XEM TẤT CẢ <i class="fa fa-caret-right"></i></a></span></h5>
	<div class="prl-grid prl-grid-divider">
		<div class="prl-span-8">
            <?php foreach($model->articles as $key=>$row):?>
            <?php if($key == 0){?>
    		   <div class="prl-grid">
    			   <div class="prl-span-6">
    					<article class="prl-article">
    						<a class="prl-thumbnail" href="<?php echo Articles::model()->getTitleURL($row);?>">
    							<span class="prl-overlay">
    								 <?php echo Articles::model()->getThumIndex($row);?>
    							</span>
    						</a>
    					</article>
    			   </div>	
    			   <div class="prl-span-6">
    					<article class="prl-article">
    						<h3 class="prl-article-title"><a href="<?php echo Articles::model()->getTitleURL($row);?>"><?php echo $row->title;?></a> 
                                <?php if($row->hot == '1'){?>
                                    <span class="prl-badge prl-badge-warning">HOT</span>
                                <?php }?>
                            </h3> 
    						<div class="prl-article-meta">
    							<i class="fa fa-calendar-o"></i> <?php echo Articles::model()->getDate($row);?>&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 23
    						</div>    
    						<p><?php echo CutString($row->short_description,200);?></p>
    					</article>
    			   </div>     
    		   </div>
           <?php }else{
                break;
           }?>
           <?php endforeach;?>
		</div>
		<div class="prl-span-4">
			<ul class="prl-list prl-list-line prl-list-arrow">
                <?php foreach($model->articles as $key=>$row):?>
                    <?php if($key != 0):?>
    				    <li><h4><a href="<?php echo Articles::model()->getTitleURL($row);?>"><?php echo $row->title;?></a></h4></li>
    				<?php endif;?>
                <?php endforeach;?>
            </ul>
		</div>
	</div>	
</div>