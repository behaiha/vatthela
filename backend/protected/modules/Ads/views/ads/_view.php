<?php
/* @var $this AdsController */
/* @var $data Ads */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_time')); ?>:</b>
	<?php echo CHtml::encode($data->start_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_time')); ?>:</b>
	<?php echo CHtml::encode($data->end_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('possition')); ?>:</b>
	<?php echo CHtml::encode(Ads::model()->getPossition($data->possition)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode(Ads::model()->getType($data->type)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_link')); ?>:</b>
	<?php echo CHtml::encode(formatContent($data->url_link)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isCurrentPage')); ?>:</b>
	<?php echo CHtml::encode(Ads::model()->getIsCurrentPage($data->isCurrentPage)); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('_order')); ?>:</b>
	<?php echo CHtml::encode($data->_order); ?>
	<br />


</div>