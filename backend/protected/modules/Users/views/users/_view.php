<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullName')); ?>:</b>
	<?php echo CHtml::encode($data->fullName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roles')); ?>:</b>
	<?php echo CHtml::encode($data->roles); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastAccessTime')); ?>:</b>
	<?php echo CHtml::encode($data->lastAccessTime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lastIPAccess')); ?>:</b>
	<?php echo CHtml::encode($data->lastIPAccess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isBlock')); ?>:</b>
	<?php echo CHtml::encode($data->isBlock); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createDate')); ?>:</b>
	<?php echo CHtml::encode($data->createDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createBy')); ?>:</b>
	<?php echo CHtml::encode($data->createBy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	*/ ?>

</div>