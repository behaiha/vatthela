<section id="main" class="prl-span-9">
   <article id="article-single"> 
	   <h1><a href="single.php"><?php echo $model->video_title;?></a></h1>
	   <hr class="prl-grid-divider">
	   <div class="prl-grid">
			<div class="prl-span-9 prl-span-flip">
				<div class="prl-entry-content">
                    <b style="color: #e74c3c;"><?php echo $model->video_shortdescription;?></b><br /><br />
                    <iframe width="560" height="315"
                        src="http://www.youtube.com/embed/<?php echo $model->video_id;?>">
                    </iframe>
                    <br />
					<?php echo $model->video_description;?>
				</div> <!-- .prl-entry-content -->
                <?php $this->widget('Videos.components.Comment',array('model'=>$model));?>
			</div>
			<div class="prl-span-3 prl-entry-meta">
				<div class="prl-article-meta">
					<span><i class="fa fa-calendar-o"></i><?php echo " ".Videos::model()->getDate($model);?></span><br /> 
					<span>
                        <a href="#comment">
                            <i class="fa fa-comment-o"></i> 
                            <fb:comments-count href="<?php echo Yii::app()->request->hostInfo.Yii::app()->createUrl('Videos/default/view',array('id'=>$model->id));?>"/></fb:comments-count>
                        </a>
                    </span>
					<i class="fa fa-eye"></i> <?php echo $model->view;?>
				</div>
				<hr class="prl-article-divider">		
				
				<ul class="prl-list prl-list-sharing">
			     <!--Share-->
                <?php $this->widget('Videos.components.Share',array('model'=>$model));?>
                <!--End share-->
				</ul>
				
				<hr class="prl-article-divider">
				<?php //$this->widget('Articles.components.Articles_ViewTag',array('model'=>$model));?>
				
				
			</div>
	   
	   </div> <!-- .prl-grid -->
	  
   </article>
  <?php //$this->widget('Articles.components.Articles_ViewRelation',array('model'=>$model));?>    
   <!-- #comment -->
</section>