<li class="clearfix">
   <article class="prl-article">
		<a class="prl-thumbnail left" href="<?php echo Videos::model()->getURL($model);?>">
			<div class="prl-overlay">
                <img src="<?php echo $model->video_image;?>" width="260"/>
                <span class="prl-overlay-area o-video"></span>
			</div>
		</a>
		<div class="prl-article-entry">
			<h2 class="prl-article-title"><a href="<?php echo Videos::model()->getURL($model);?>"><?php echo $model->video_title;?></a> 
                <?php if($model->hot == '1'):?><span class="prl-badge prl-badge-warning">HOT</span><?php endif;?>
            </h2> 
			<div class="prl-article-meta">
                <i class="fa fa-calendar-o"></i> <?php echo Videos::model()->getDate($model);?>&nbsp;&nbsp;<i class="fa fa-comment-o"></i> 
                <fb:comments-count href="<?php echo Yii::app()->request->hostInfo.Yii::app()->createUrl('Videos/default/view',array('id'=>$model->id));?>"/></fb:comments-count>
            </div>    
			<p><?php echo CutString($model->video_shortdescription,400);?></p>
		</div>
	</article>
</li>

