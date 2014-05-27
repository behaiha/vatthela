<section id="main" class="prl-span-9">
   <article id="article-single"> 
	   <h1><a href="single.php"><?php echo $model->title;?></a></h1>
	   <hr class="prl-grid-divider">
	   <div class="prl-grid">
			<div class="prl-span-9 prl-span-flip">
				<div class="prl-entry-content">
                    <b style="color: #e74c3c;"><?php echo $model->short_description;?></b>
					<?php echo $model->description;?>
				</div> <!-- .prl-entry-content -->
			</div>
			<div class="prl-span-3 prl-entry-meta">
				<div class="prl-article-meta">
					<span><i class="fa fa-calendar-o"></i><?php echo " ".Articles::model()->getDate($model);?></span><br /> 
					<span><a href="#comment"><i class="fa fa-comment-o"></i> 23</a></span>
					<i class="fa fa-eye"></i> <?php echo $model->view;?>
				</div>
				<hr class="prl-article-divider">		
                <p class="rating-head">Editor review</p>
                <p class="prl-post-rating ">
                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                </p>
                <p>Excellent: 10/10</p>
                <strong>Design</strong>
                <div class="prl-progress prl-progress-mini">
                <div class="prl-progress-bar" style="width: 40%;"></div>
                </div>
                
                <strong>Touch screen</strong>
                <div class="prl-progress prl-progress-mini">
                <div class="prl-progress-bar" style="width: 70%;"></div>
                </div>
                <strong>Battery</strong>
                <div class="prl-progress prl-progress-mini">
                <div class="prl-progress-bar" style="width: 40%;"></div>
                </div>
                
                <strong>Applications</strong>
                <div class="prl-progress prl-progress-mini">
                <div class="prl-progress-bar" style="width: 70%;"></div>
                </div>
                <hr class="prl-article-divider">
                <p class="rating-head">User rating: 3.76 (440)</p>
                <p class="prl-post-rating prl-user-rating">
                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half-o"></i>
                </p>						
				<hr class="prl-article-divider">
				
				<ul class="prl-list prl-list-sharing">
					<li class="header">SHARING</li>
					<li><a href="#"><i class="fa fa-facebook-square"></i> Facebook</a></li>
					<li><a href="#"><i class="fa fa-twitter-square"></i> Twitter</a></li>
					<li><a href="#"><i class="fa fa-google-plus-square"></i> Google plus</a></li>
					<li><a href="#"><i class="fa fa-pinterest-square"></i> Pinterest</a></li>
					<li><a href="#"><i class="fa fa-linkedin-square"></i> Linkedin</a></li>
					<li><a href="#"><i class="fa fa-envelope"></i> Mail this article</a></li>
					<li><a href="#" onclick="window.print();" id="print-page"><i class="fa fa-print"></i> Print this article</a></li>
				</ul>
				
				<hr class="prl-article-divider">
				<?php $this->widget('Articles.components.Articles_ViewTag',array('model'=>$model));?>
				
				
			</div>
	   
	   </div> <!-- .prl-grid -->
	  
   </article>
  <?php $this->widget('Articles.components.Articles_ViewRelation',array('model'=>$model));?>    
   <!-- #comment -->
</section>