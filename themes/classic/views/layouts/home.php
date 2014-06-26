<!DOCTYPE html>
<html lang="en">
    <?php 
                $this->widget('application.components.Head',array(
                      'pageTitleInfo'=>$this->pageTitleInfo,
                      'keywords' =>$this->keywords,
                      'robotsIndex' => $this->robotsIndex,
                      'face_title'=>$this->face_title,
                      'face_des'=>$this->face_des,
                      'face_image'=>$this->face_image,
                      'face_url'=>$this->face_url,
                      'face_status'=>$this->face_status
                    ));
                ?>
        
    <body class="site-boxed">
    	<div class="site-wrapper">
    		<div class="prl-container">
                <?php $this->widget('application.components.Header');?>
                <?php $this->widget('Users.components.Header_Login'); ?>
    			<?php $this->widget('application.components.Nav');?>
    			<?php $this->widget('application.components.Search');?>  
                <?php $this->widget('application.components.Off_Canvas');?>  

    		</div>
    		<div class="prl-container">
    			<div class="prl-grid prl-grid-divider">
    				<?php echo $content;?>
    				<?php $this->widget('application.components.Sidebar');?>  
    			</div><!--.prl-grid-->
    		</div>
    		<?php $this->widget('application.components.Footer');?>  
    	</div><!-- .site-wrapper -->
    	<a id="toTop" href="#"><i class="fa fa-long-arrow-up"></i></a>
    	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/superfish.js"></script>
    	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/flexslider/jquery.flexslider-min.js"></script>
    	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.masonry.min.js"></script>
    	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/plugins.js"></script>
    </body>
</html> 