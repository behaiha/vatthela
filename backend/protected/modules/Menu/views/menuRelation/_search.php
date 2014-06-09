<?php
/* @var $this MenuRelationController */
/* @var $model MenuRelation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'menu_id'); ?>
		<?php echo $form->textField($model,'menu_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'table_id'); ?>
		<?php echo $form->textField($model,'table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'table_name'); ?>
		<?php echo $form->textField($model,'table_name',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'possition'); ?>
		<?php echo $form->textField($model,'possition'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'text'); ?>
		<?php echo $form->textField($model,'text',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_id'); ?>
		<?php echo $form->textField($model,'parent_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->