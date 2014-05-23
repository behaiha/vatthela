<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'action'=>Yii::app()->createUrl('/Users/default/login'),
			'htmlOptions'=>array('class'=>'login-header',),
		)); ?>
<div>
	<div class="head-login-username">
		<p>Tài khoản đăng nhập</p>
		<?php echo $form->textField($model,'username',array('class'=>'input-login','placeholder'=>$model->getAttributeLabel('username'))); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="head-login-password">
		<p>Mật khẩu người dùng</p>
		<?php echo $form->passwordField($model,'password',array('class'=>'input-login','placeholder'=>$model->getAttributeLabel('password'))); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
	<button class="submit-login" type="submit">Đăng nhập</button>
</div>
<label >
	<input type="checkbox" id="form-s-mix1" checked="checked"> Remember me
</label>
<a href="#">Lost your password?</a>
<?php $this->endWidget(); ?>