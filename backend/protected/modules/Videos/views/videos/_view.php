<?php
/* @var $this VideosController */
/* @var $data Videos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_id')); ?>:</b>
	<?php echo CHtml::encode($data->video_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_title')); ?>:</b>
	<?php echo CHtml::encode($data->video_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_shortdescription')); ?>:</b>
	<?php echo CHtml::encode($data->video_shortdescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('video_description')); ?>:</b>
	<?php echo CHtml::encode($data->video_description); ?>
	<br />


</div>