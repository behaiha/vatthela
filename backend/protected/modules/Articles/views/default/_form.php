<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl.'/'; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl.'/'; ?>ckeditor/adapters/jquery.js"></script>
<?php
/* @var $this DefaultController */
/* @var $model Articles */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articles-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
    
    <div class="row">
	   	<?php $image = ''; ?>
        <?php echo $form->labelEx($model,'image'); ?>
        <?php echo $form->fileField($model,'image',array('id'=>'filesToUpload')); ?>
        <?php 
            if ($model->image != '' and $model->path != '') {
                $image = Yii::app()->request->baseUrl.'/'.$model->path.'/thumbai_300/'.$model->image;
            }
         ?>
        <div>
            <img src="<?php echo $image; ?>" id='image' width='200px'/>
        </div>
        <?php echo $form->error($model,'image'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'Articles Hot'); ?>
		<?php echo $form->dropDownList($model,'hot',array('0'=>"Bình thường",'1'=>"Hot")); ?>
		<?php echo $form->error($model,'hot'); ?>
	</div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'End Hot Date'); ?>
        <?php 
	        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	            //'name'=>'endhot_date',
                'model'=>$model,
	            'attribute'=>'endhot_date',
	            'language'=>Yii::app()->language=='vi' ? 'vi' : null,
	            'options'=>array(
	                'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
	                'showOn'=>'focus', // 'focus', 'button', 'both'
	                //'buttonText'=>'Chọn ngày tháng',
	                //'buttonImage'=>Yii::app()->theme->baseUrl.'/img/icon/calendar.png',
	                'buttonImageOnly'=>false,
	                'showAnim'=>'clip',
	                'changeMonth'=>true,
	                'changeYear'=>true,
	                'showButtonPanel'=>true,
	                'dateFormat' => "yy-mm-dd",
	                'buttonImageOnly'=>true,
	                //'minDate'=>'-0',
	                'yearRange' => "2013:2020",
	            ),
	            'htmlOptions'=>array(
	                //'style'=>'width:80px;vertical-align:top;margin-left: 10px;',
	                'placeholder'=>"Ngày kết thức tin hót",
	            ),
	        ));
	     ?>
         <?php echo $form->error($model,'endhot_date'); ?>
    
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'short_description'); ?>
		<?php echo $form->textArea($model,'short_description',array('rows'=>6, 'cols'=>50,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'short_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
        <script>$( '#Articles_description' ).ckeditor();</script>
	</div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#count-title').html($("#ar-title").val().length);
            $("#count-seo_description").html($("#seo_description").val().length);
        });
    </script>
	   <div class="row">
        <?php echo $form->labelEx($model,'seo_title'); ?>
        <?php echo $form->textField($model,'seo_title',array('size'=>60,'placeholder'=>"Tối đa là 70 ký tự",'maxlength'=>100,'id'=>'ar-title','style'=>'float:left;','onkeyup'=>'
                $("#count-title").html($("#ar-title").val().length);
        ')); ?>
        <div style="float:left;margin: 3px 10px;">
            <div style="float:left;">Đã nhập:&nbsp;</div> <div style="float:left;" id="count-title">0</div>
            <div style="float:left;">&nbsp; ký tự</div>
        </div>
        <div class="clear"></div>
        <?php echo $form->error($model,'seo_title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'seo_description'); ?>
        <?php echo $form->textArea($model,'seo_description',array('rows'=>6,'size'=>60,'maxlength'=>200,'placeholder'=>"Tối đa là 140 ký tự",'cols'=>50,'id'=>'seo_description','style'=>'float:left;','onkeyup'=>'
                $("#count-seo_description").html($("#seo_description").val().length);
        ')); ?>
        <div style="float:left;margin: 3px 10px;">
            <div style="float:left;">Đã nhập:&nbsp;</div> <div style="float:left;" id="count-seo_description">0</div>
            <div style="float:left;">&nbsp; ký tự</div>
        </div>
        <div class="clear"></div>
        <?php echo $form->error($model,'seo_description'); ?>
    </div>


	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->dropDownList($model,'active',array('2'=>"Hiện",'1'=>"Ẩn")); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>
    
	<?php $this->widget('Tags.components.TagWidget',array('model'=>$model)); ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
    <?php $this->widget('Categories.components.CategoryWidget',array('model'=>$model,'type'=>'A'));?>

<?php $this->endWidget(); ?>

</div><!-- form -->
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
                    $('#image').attr('src',evt.target.result);
                };
            }(file));
            reader.readAsDataURL(file);
            
        }
    } else {
        alert('The File APIs are not fully supported in this browser.');
    }
}
document.getElementById('filesToUpload').addEventListener('change', fileSelect, false);
</script>