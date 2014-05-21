<figure class="<?php echo Articles::getNameFigure($value).' '.FIGURE_NAME; ?>">
	<a href="<?php echo Articles::getLinkArticles($value); ?>" class="thumb">
		<?php echo Articles::getImage($value); ?>
	</a>
	<figcaption>
		<a href="project.html">
			<h3 class="heading"><?php echo $value->title; ?> </h3>
		</a>
		<?php echo $value->short_description; ?>
	</figcaption>
</figure>