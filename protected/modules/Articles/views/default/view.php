<section id="main" class="prl-span-9">
   <article id="article-single"> 
	   <h1><a href="single.php"><?php echo $model->title;?></a></h1>
	   <hr class="prl-grid-divider">
	   <div class="prl-grid">
			<div class="prl-span-9 prl-span-flip">
				<div class="prl-entry-content">
                    <b style="color: #e74c3c;"><?php echo $model->short_description;?></b><br />
					<?php echo $model->description;?>
				</div> <!-- .prl-entry-content -->
                <?php $this->widget('Articles.components.CommentFace',array('model'=>$model));?>
			</div>
            
            
			
            <div class="prl-span-3 prl-entry-meta">
				<div class="prl-article-meta">
					<span><i class="fa fa-calendar-o"></i><?php echo " ".Articles::model()->getDate($model);?></span><br /> 
					<span><a href="#comment"><i class="fa fa-comment-o"></i> 23</a></span>
					<i class="fa fa-eye"></i> <?php echo $model->view;?>
				</div>						
				<hr class="prl-article-divider">
				
				<!--Share-->
                <?php $this->widget('Articles.components.Share',array('model'=>$model));?>
                <!--End share-->
				
				<hr class="prl-article-divider">
				<?php $this->widget('Articles.components.Articles_ViewTag',array('model'=>$model));?>
			</div>
	   </div> <!-- .prl-grid -->
	  
   </article>
   
   <?php $this->widget('Articles.components.Articles_ViewRelation',array('model'=>$model));?>    
   <!-- #comment -->
</section>