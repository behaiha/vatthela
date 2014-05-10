<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'password-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
    <h1 style="margin-bottom: 17px;">Thay đổi mật khẩu</h1>
    <h2 id="use-pass-error" style="color: red;text-align: center;margin-left: -39px;"></h2>
    <div class="row">
        <?php echo $form->labelEx($model,'currentPassword',array('class'=>'use-label')); ?>
        <?php echo $form->passwordField($model,'currentPassword',array('class'=>'use-input use-input-add')); ?>
        <?php echo $form->error($model,'currentPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'newPassword',array('class'=>'use-label')); ?>
        <?php echo $form->passwordField($model,'newPassword',array('class'=>'use-input use-input-add')); ?>
        <?php echo $form->error($model,'newPassword'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'confirmNewPassword',array('class'=>'use-label')); ?>
        <?php echo $form->passwordField($model,'confirmNewPassword',array('class'=>'use-input use-input-add')); ?>
        <?php echo $form->error($model,'confirmNewPassword'); ?>
    </div>
  <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->