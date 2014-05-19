<header>
	<div class="wrapper cf">
		<?php
            foreach($model as $row){
                //echo Slideshow::model()->getImageSlide($row);
            }
        ?>
		<div id="logo">
			<a href="index.html"><img  src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="Simpler"></a>
		</div>
		
		<!-- nav -->
		<ul id="nav" class="sf-menu">
			<li class="current-menu-item"><a href="index.html">HOME</a></li>
			<li><a href="blog.html">BLOG</a></li>
			<li><a href="page.html">ABOUT</a>
				<ul>
					<li><a href="page-elements.html">Elements</a></li>
					<li><a href="page-icons.html">Icons</a></li>
					<li><a href="page-typography.html">Typography</a></li>
				</ul>
			</li>
			<li><a href="portfolio.html">WORK</a></li>
			<li><a href="contact.html">CONTACT</a></li>
			<li><a href="http://luiszuno.com/blog/downloads/folder-template">DOWNLOAD NOW!</a></li>
		</ul>
		<div id="combo-holder"></div>
		<!-- ends nav -->
		
		
		<!-- SLIDER -->				
		<div id="home-slider" class="lof-slidecontent">
			
			<div class="preload"><div></div></div>
			
			<!-- slider content --> 
			<div class="main-slider-content" >
			<ul class="sliders-wrap-inner">
                <?php foreach($model as $row):?>
			    <li>
			          <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/01.jpg" title="" alt="alt" />          
			          <div class="slider-description">
			            <h4>Lorem ipsum dolor</h4>
			            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est...
			            <a class="link" href="#">Read more </a>
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
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/01_thumb.jpg" alt="alt" /></li>
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/02_thumb.jpg" alt="alt" /></li>
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/03_thumb.jpg" alt="alt" /></li>
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/04_thumb.jpg" alt="alt" /></li>
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/05_thumb.jpg" alt="alt" /></li>
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/06_thumb.jpg" alt="alt" /></li>
			           <li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/slides/07_thumb.jpg" alt="alt" /></li>
			        </ul>
			  </div>
			  <div class="button-next">Next</div>
			  <div  class="button-previous">Previous</div>
			  <!-- REMOVED TILL FIXED <div class="button-control"><span>STOP</span></div> -->
			</div> 
			<!-- slider nav -->
			
			
		          
		 </div> 
		<!-- ENDS SLIDER -->
	</div>
</header>