<?php
	$filter ='';
	foreach ($value->categories as $key ) {
		$filter = ' cate'.$key->id;
	}
?>
<figure class="<?php echo $filter; ?>">
	<a href="project.html" class="thumb">
		<?php echo Articles::getImage($value); ?>
		<!-- <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/dummies/featured/01.jpg" alt="alt" /> -->
	</a>
	<figcaption>
		<a href="project.html">
			<h3 class="heading"><?php echo $value->title; ?> </h3>
		</a>
		<?php echo $value->short_description; ?>
	</figcaption>
</figure>