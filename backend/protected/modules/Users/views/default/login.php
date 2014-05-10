<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="span-19">
	<div id="content">
    <h1>Đăng nhập</h1>
    <div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
    	'id'=>'login-form',
    	'enableClientValidation'=>false,
    	'clientOptions'=>array(
    		'validateOnSubmit'=>false,
    	),
    )); ?>
    
    	<div class="row">
    		<?php echo $form->labelEx($model,'username'); ?>
    		<?php echo $form->textField($model,'username'); ?>
    		<?php echo $form->error($model,'username'); ?>
    	</div>
    
    	<div class="row">
    		<?php echo $form->labelEx($model,'password'); ?>
    		<?php echo $form->passwordField($model,'password'); ?>
    		<?php echo $form->error($model,'password'); ?>
    	</div>
    
    	<div class="row rememberMe">
    		<input name="rememberMe" id="Users_rememberMe" value="1" type="checkbox">
    		<?php echo $form->label($model,'rememberMe'); ?>
    		<?php echo $form->error($model,'rememberMe'); ?>
    	</div>
    
    	<div class="row buttons">
    		<?php echo CHtml::submitButton('Login'); ?>
    	</div>
    
    <?php $this->endWidget(); ?>
    </div><!-- form -->
</div><!-- form -->
</div><!-- form -->
