<?php 
	$srcImg = "./images/event/image.jpg";
	$styleImg = '';$style = '';
	if ($model->coveImage != null) {
		$srcImg = Yii::app()->baseUrl.$model->coveImage->path.$model->coveImage->image;
		$styleImg = "style='".$model->coveImage->style."'";
		$style = $model->coveImage->style;
	}
?>
<div id="slider">
	<div id="homeslider" class="fullwidth flexslider">
		<article>
			<div class="image-logo">
				<a href="#">
					<img class="drag" src="<?php echo $srcImg; ?>" <?php echo $styleImg; ?> >

				</a>
				<button class="delete-image chang-image prl-button prl-button-newsletter" >Hủy bỏ</button>
				<button class="save-image chang-image prl-button prl-button-primary">Thay đổi ảnh bìa </button>
			</div>	
			<div class="img-avatat">
				<img class="avatar" src="./images/users/avatar/avatar.png">
				<button class="save-avatar prl-button prl-button-primary" id="change-avatars">Thay đổi ảnh đại diện</button>
				<span class="name-user">Nhữ Tuấn Anh</span>
			</div>		
		</article>
	</div><!-- #slider -->	
</div>
<input type="file" name="filesToUpload[]" class="input-file" id="filesToUpload" />
<input type="file" name="filesToUpload[]" class="input-file" id="filesToUploadAvatar" />
<style type="text/css">
.input-file{
	display: none;
}
</style>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/coverImage.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/avatar.js"></script>
<script type="text/javascript">
	jQuery('#change-avatars').click(function() {
		jQuery('#filesToUploadAvatar').click();
	})
	jQuery(document).ready(function(e) {
		var dataEvent = {
			fileUpload:'filesToUpload',
			buttonUpload:'.save-image',
			nameImg:'.drag',
			nameDiv:'.image-logo',
			btnDelete:'.delete-image',
			title:'.event-title',
			urlSaveImg : '<?php echo Yii::app()->createUrl("/Image/coverImage/saveimage") ?>',
			urlUpImg : '<?php echo Yii::app()->createUrl("/Image/coverImage/image") ?>',
			urlDeImge:  '<?php echo Yii::app()->createUrl("/Image/coverImage/deleteimage") ?>',
			nameTable:'U',
			idEvent: <?php echo $model->id; ?>,
			styleOld : '<?php echo $style; ?>',
			imgEvent : '<?php echo $srcImg; ?>',
			sizeMax:10000000,
			widthMin : 400,
			heightMin:100,
		};
		var imgView = new CoverImage(dataEvent);
	});
</script> 