<?php
/* @var $this DefaultController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">

		<?php 
            if ($check == 0) {
            	$parents = Categories::model()->findAll('parent_id = 0');
	            $data = Categories::model()->makeDropDown($parents);
	            echo CHtml::dropDownList('Categories[parent_id]','',CHtml::listData($parents,'id','title'),array('prompt'=>'Chọn danh mục'));
            }
        ?>
        <?php if($check != 0): ?>
        	<input type="hidden" value="<?php echo $check; ?>" name="Categories[parent_id]" />
        	<h1>
        	Tạo thêm danh mục cho loại: 
        	<?php  Categories::model()->getTitle($check); ?></h1>
    	<?php endif; ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_possition'); ?>
		<?php echo $form->textField($model,'order_possition'); ?>
		<?php echo $form->error($model,'order_possition'); ?>
	</div>
	<?php if($check == 0): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('G'=>"Không hiển thị tại index",'A'=>"Hiển thị tại index")); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<?php else: ?>
		<?php 
		$type =  Categories::model()->findByPk($check);
		echo $form->hiddenField($model,'type',array('value'=>$type->type)); ?>
	<?php endif; ?>

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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->