<?php
/* @var $this MenuRelationController */
/* @var $model MenuRelation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-relation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_id'); ?>
		<?php echo $form->textField($model,'menu_id'); ?>
		<?php echo $form->error($model,'menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'table_id'); ?>
		<?php echo $form->textField($model,'table_id'); ?>
		<?php echo $form->error($model,'table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'table_name'); ?>
		<?php echo $form->textField($model,'table_name',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'table_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'possition'); ?>
		<?php echo $form->textField($model,'possition'); ?>
		<?php echo $form->error($model,'possition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textField($model,'text',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->