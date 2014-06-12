<?php
/* @var $this AdsController */
/* @var $model Ads */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ads-form',
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
		<?php echo $form->labelEx($model,'Quảng cáo cho mobile hay desktop'); ?>
        <?php $mobile = array('0'=>'Desktop','1'=>'Mobile')?>
		<?php echo $form->dropDownList($model,'mobile',$mobile); ?>
		<?php echo $form->error($model,'mobile'); ?>
	</div>
    <div class="row">
		<?php echo $form->labelEx($model,'Tên quảng cáo'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'start_time'); ?>
		<?php 
	        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	            'model'=>$model,
	            'attribute'=>'start_time',
	            'language'=>Yii::app()->language=='vi' ? 'vi' : null,
	            'options'=>array(
	                'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
	                'showOn'=>'focus', // 'focus', 'button', 'both'
	                //'buttonText'=>'Ch?n ngày tháng',
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
	                'placeholder'=>"Chọn ngày bắt đầu",
	            ),
	        ));
	     ?>
		<?php echo $form->error($model,'start_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_time'); ?>
		<?php 
	        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
	            'model'=>$model,
	            'attribute'=>'end_time',
	            'language'=>Yii::app()->language=='vi' ? 'vi' : null,
	            'options'=>array(
	                'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
	                'showOn'=>'focus', // 'focus', 'button', 'both'
	                //'buttonText'=>'Ch?n ngày tháng',
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
	                'placeholder'=>"Chọn ngày kết thúc",
	            ),
	        ));
	     ?>
		<?php echo $form->error($model,'end_time'); ?>
	</div>

	<div class="row" id="display_po">
		<?php echo $form->labelEx($model,'possition'); ?>
		<?php //echo $form->textField($model,'possition'); ?>
        <?php $option = array('1'=>'Top','2'=>'Bottom','3'=>'Left','4'=>'Right','5'=>'Center');?>
        <?php 
            echo $form->dropDownList($model,'possition',$option);
        ?>
		<?php echo $form->error($model,'possition'); ?>
        <p style="color: red;">Note: <b id="note_possition">Quảng cáo tại Banner. Ảnh có kích thước 1002x304</b></p>
        <script>
            $("#Ads_possition").click(function(){
                var note = $("#Ads_possition").val();
                if(note == 1){
                    $("#note_possition").html("Quảng cáo tại Banner. Ảnh có kích thước 1002x304");
                }else if(note == 2){
                     $("#note_possition").html("Quảng cáo tại Footer. Ảnh có kích thước 100x100");
                }else if(note == 3){
                    $("#note_possition").html("Quảng cáo tại Left Sidebar. Ảnh có kích thước 250x300");
                }else if(note == 4){
                    $("#note_possition").html("Quảng cáo tại Right Sidebar. Ảnh có kích thước 250x300");
                }
                else if(note == 5){
                    $("#note_possition").html("Quảng cáo giữa website. Ảnh có kích thước 352x141");
                }
            });
            
        </script>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
        <?php $optiontype = array('1'=>'Image','2'=>'Html')?>
		<?php echo $form->dropDownList($model,'type',$optiontype); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<div class="image">		
	    <div class="row">
	        <?php echo $form->labelEx($model,'image'); ?>
	        <?php echo CHtml::activeFileField($model, 'image'); ?>
	        <?php echo $form->error($model,'image'); ?>
	        <p>
	        <?php if($model->isNewRecord != 1){?>
	            <?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$model->path.$model->image,'',array('style'=>'width:200px','id'=>'image')); ?>
	        <?php }else{
	        ?>
	            <img id="image" src="" style="width: 300px;"/>
	        <?php };?>
	        </p>
	    </div>
	    <div class="row">
			<?php echo $form->labelEx($model,'width'); ?>
			<?php echo $form->textField($model,'width',array('size'=>10,'maxlength'=>300)); ?>
			<?php echo $form->error($model,'width'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'height'); ?>
			<?php echo $form->textField($model,'height',array('size'=>10,'maxlength'=>300)); ?>
			<?php echo $form->error($model,'height'); ?>
		</div>
	    <div class="row">
			<?php echo $form->labelEx($model,'Alt image'); ?>
			<?php echo $form->textField($model,'alt',array('size'=>60,'maxlength'=>300)); ?>
			<?php echo $form->error($model,'alt'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'url_link'); ?>
			<?php echo $form->textField($model,'url_link',array('size'=>60,'maxlength'=>200)); ?>
			<?php echo $form->error($model,'url_link'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'isCurrentPage'); ?>
			<?php echo $form->dropDownList($model,'isCurrentPage',array('1'=>'Mở tại trang','2'=>'Mở ở trang khác'));  ?>
			<?php echo $form->error($model,'isCurrentPage'); ?>
		</div>

	</div>
	<div class="html">
		<div class="row">
			<?php echo $form->labelEx($model,'html'); ?>
			<?php echo $form->textArea($model,'html',array('rows'=>6, 'cols'=>50,'maxlength'=>500)); ?>
			<?php echo $form->error($model,'html'); ?>
		</div>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'_order'); ?>
		<?php echo $form->textField($model,'_order'); ?>
		<?php echo $form->error($model,'_order'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<style type="text/css">
	.html{
		display: none;
	}
</style>
<script>
jQuery(document).ready(function($) {
	if ($('#Ads_type').val() == 1) {
		$('.image').fadeIn();
		$('.html').fadeOut();
	}else if($('#Ads_type').val() == 2){
		$('.image').fadeOut();
		$('.html').fadeIn();
	}
});
$('#Ads_type').change(function(e) {
	if (e.target.value == 1) {
		$('.image').fadeIn();
		$('.html').fadeOut();
	}else if(e.target.value == 2){
		$('.image').fadeOut();
		$('.html').fadeIn();
	}
	console.log('a');
});
$("#Ads_mobile").click(function(){
   var mobile =  $("#Ads_mobile").val();
   if(mobile == 1){
        document.getElementById('note_possition').style.display = 'none';
   }else{
        document.getElementById('note_possition').style.display = 'block';
   }
});
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
document.getElementById('Ads_image').addEventListener('change', fileSelect, false);
</script>