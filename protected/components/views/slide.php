<!--By Trai Ngèo @2014-->
<div id="home-slider" class="lof-slidecontent">
	
	<div class="preload"><div></div></div>
	
	<!-- slider content --> 
	<div class="main-slider-content" >
	<ul class="sliders-wrap-inner">
        <?php foreach($model as $row):?>
	    <li>
	          <img src="<?php echo Yii::app()->baseUrl.SLIDE_SHOW.$row->image;?>" title="<?php echo $row->cate->url;?>" alt="<?php echo $row->cate->url;?>" />      
	          <div class="slider-description">
	            <h4><?php echo $row->cate->title;?></h4>
	            <p><?php echo $row->cate->description;?>
	            <a class="link" href="#">Xem ngay</a>
	            </p>
	         </div>
	    </li>
	    <?php endforeach;?>
	  </ul>  	
	</div>
	<!-- ENDS slider content --> 
           
	<!-- slider nav -->
	<div class="navigator-content">
	  <div class="navigator-wrapper">
	        <ul class="navigator-wrap-inner">
            <?php foreach($model as $row):?>
	           <li><img class="slideshow-thumb" src="<?php echo Yii::app()->baseUrl.SLIDE_SHOW.$row->image;?>" title="" alt="alt"/></li>
            <?php endforeach;?>
	        </ul>
	  </div>
	  <div class="button-next">Next</div>
	  <div  class="button-previous">Previous</div>
	  <!-- REMOVED TILL FIXED <div class="button-control"><span>STOP</span></div> -->
	</div> 
	<!-- slider nav -->
	
	
          
 </div> 