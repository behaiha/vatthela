
<section id="main" class="prl-span-9">
<div id="primary-left">   
<div class="form">
	<h1>Đăng ký tài khoản người dùng</h1>
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'users-form',
		'enableAjaxValidation'=>true,
        'clientOptions'=>array(
	        'validateOnSubmit'=>true,
	    ),
	)); ?>
		<?php echo $form->errorSummary($model); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'displayName'); ?>
			<?php echo $form->textField($model,'displayName',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'displayName'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'confirmPassword'); ?>
			<?php echo $form->passwordField($model,'confirmPassword',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'confirmPassword'); ?>
		</div>
		<div class="row rowselect">
			<?php echo $form->labelEx($model,'year'); ?>
			<?php echo $form->dropDownList($model,'day',Users::getMonthtoYear('d'),array('prompt'=>'Ngày')); ?>
			<?php echo $form->dropDownList($model,'month',Users::getMonthtoYear('m'),array('prompt'=>'Tháng')); ?>
			<?php echo $form->dropDownList($model,'year',Users::getMonthtoYear('y'),array('prompt'=>'Năm')); ?>
			<?php echo $form->error($model,'year'); ?>
		</div>
		<div class="row rowraddo">
			<?php echo $form->labelEx($model,'gender'); ?>
			<div class="rowradio">
				<input value="Male" name="Users[gender]" id="Users_gender" type="radio"><span>Male</span>
			</div>
			<div class="rowradio">
				<input value="Female" name="Users[gender]" id="Users_gender" type="radio"><span>Female</span>
			</div>
			<?php echo $form->error($model,'gender'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Tạo tài khoản mới',array('id'=>'createUser')); ?>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
</div>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('.rowradio input[type="radio"').removeAttr('checked');
	});
</script>
</section>
















