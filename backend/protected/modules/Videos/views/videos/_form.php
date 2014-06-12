<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl.'/'; ?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl.'/'; ?>ckeditor/adapters/jquery.js"></script>
<?php
/* @var $this VideosController */
/* @var $model Videos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'videos-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'video_id'); ?>
		<?php echo $form->textField($model,'video_id',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'video_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_title'); ?>
		<?php echo $form->textField($model,'video_title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'video_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_shortdescription'); ?>
		<?php echo $form->textField($model,'video_shortdescription',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'video_shortdescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'video_description'); ?>
		<?php echo $form->textArea($model,'video_description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'video_description'); ?>
	</div>
    <script>$( '#Videos_video_description' ).ckeditor();</script>
    
    <div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->dropDownList($model,'active',array('0'=>"Hiện",'1'=>"Ẩn")); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'hot'); ?>
		<?php echo $form->dropDownList($model,'hot',array('0'=>"Bình thường",'1'=>"Hot")); ?>
		<?php echo $form->error($model,'hot'); ?>
	</div>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->