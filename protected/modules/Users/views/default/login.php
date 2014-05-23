<section id="main" class="prl-span-9 login-main">
<div class="login">
	<h5>Đăng nhập hệ thống</h5>

	<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>
	<?php //echo $form->errorSummary($model); ?>
		<div class="row">
			<p class="label-input"><?php echo $model->getAttributeLabel('username'); ?></p>
			<?php echo $form->textField($model,'username',array('class'=>'input-login-view')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="row">
			<p class="label-input"><?php echo $model->getAttributeLabel('password'); ?></p>
			<?php echo $form->passwordField($model,'password',array('class'=>'input-login-view')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>

		<div class="login-bottom">
			<div class="row rememberMe">
				<?php echo $form->checkBox($model,'rememberMe',array('class'=>'checkbox-login')); ?>
				<?php echo $form->label($model,'rememberMe'); ?>
				<?php echo $form->error($model,'rememberMe'); ?>
			</div>

			<div class="row buttons">
				<?php echo CHtml::submitButton('Đăng nhập',array('class'=>'login-submit')); ?>
				<p>Hoặc </p><a href="">Đăng ký tài khoản</a>
			</div>
			<a href="">Quên mật khẩu?</a>
		</div>

	<?php $this->endWidget(); ?>
	</div><!-- form -->
</div>
</section>