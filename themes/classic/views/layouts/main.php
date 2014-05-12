
<!doctype html>
<html class="no-js">

	<?php $this->widget('application.components.Head');?>
	
	<body class="home">
	
		<!-- HEADER -->
		<?php $this->widget('application.components.Body_Header');?>
		<!-- ENDS HEADER -->
		
		<!-- MAIN -->
		<div id="main">
			<?php echo $content;?>
		</div>
		<!-- ENDS MAIN -->
		
		
		<!-- FOOTER -->
		<?php $this->widget('application.components.Footer');?>
		<!-- ENDS FOOTER -->
		
	</body>
	
	
	
</html>