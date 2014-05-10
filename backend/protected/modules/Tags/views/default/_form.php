<?php
/* @var $this DefaultController */
/* @var $model Tags */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tags-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#count-title').html($("#ar-title").val().length);
            $("#count-seo_description").html($("#seo_description").val().length);
        });
    </script>
	   <div class="row">
        <?php echo $form->labelEx($model,'title'); ?>
        <?php echo $form->textField($model,'title',array('size'=>60,'placeholder'=>"Tối đa là 70 ký tự",'maxlength'=>100,'id'=>'ar-title','style'=>'float:left;','onkeyup'=>'
                $("#count-title").html($("#ar-title").val().length);
        ')); ?>
        <div style="float:left;margin: 3px 10px;">
            <div style="float:left;">Đã nhập:&nbsp;</div> <div style="float:left;" id="count-title">0</div>
            <div style="float:left;">&nbsp; ký tự</div>
        </div>
        <div class="clear"></div>
        <?php echo $form->error($model,'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'description'); ?>
        <?php echo $form->textArea($model,'description',array('rows'=>6,'size'=>60,'maxlength'=>200,'placeholder'=>"Tối đa là 140 ký tự",'cols'=>50,'id'=>'seo_description','style'=>'float:left;','onkeyup'=>'
                $("#count-seo_description").html($("#seo_description").val().length);
        ')); ?>
        <div style="float:left;margin: 3px 10px;">
            <div style="float:left;">Đã nhập:&nbsp;</div> <div style="float:left;" id="count-seo_description">0</div>
            <div style="float:left;">&nbsp; ký tự</div>
        </div>
        <div class="clear"></div>
        <?php echo $form->error($model,'description'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->