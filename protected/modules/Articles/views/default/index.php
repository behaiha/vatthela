<section id="main" class="prl-span-9"> 
	<?php $this->widget('Articles.components.Articles_Slideshow');?>               

	<?php $this->widget('Articles.components.Articles_News');?>    
	<?php foreach($model as $row):?>
	   <?php $this->widget('Articles.components.Articles_DisplayHomeNews',array('model'=>$row));?>    
    <?php endforeach;?>           
</section>