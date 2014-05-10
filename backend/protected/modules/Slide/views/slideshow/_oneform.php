<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-image-form',
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>
	<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php 
            $parents = Categories::model()->findAll('parent_id = 0');
            $data = Categories::model()->makeDropDown($parents);
        ?>
        <?php echo $form->dropDownList($model,'category_id',$data); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo CHtml::activeFileField($model, 'image'); ?>
        <?php echo $form->error($model,'image'); ?>
        <p>
        <?php if($model->isNewRecord != 1){?>
            <?php echo Slideshow::model()->getImageSlide($model); ?>
        <?php }else{
        ?>
            <img id="image" src="" style="width: 300px;"/>
        <?php };?>
        </p>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'alt'); ?>
		<?php echo $form->textField($model,'alt',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'alt'); ?>
	</div>
    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
<?php $this->endWidget(); ?>
</div>
<script>
function fileSelect(evt) {
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
        var result = '';
        var file;
        for (var i = 0; file = files[i]; i++) {
            // if the file is not an image, continue
            if (!file.type.match('image.*')) {
                continue;
            }
 
            reader = new FileReader();
            reader.onload = (function (tFile) {
                return function (evt) {
                    //console.log(evt.target.result);
                    $('#image').attr('src',evt.target.result);
                };
            }(file));
            reader.readAsDataURL(file);
            
        }
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
document.getElementById('Slideshow_image').addEventListener('change', fileSelect, false);
</script>