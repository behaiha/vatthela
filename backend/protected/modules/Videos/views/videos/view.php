<?php
/* @var $this VideosController */
/* @var $model Videos */

$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Videos', 'url'=>array('index')),
	array('label'=>'Create Videos', 'url'=>array('create')),
	array('label'=>'Update Videos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Videos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Videos', 'url'=>array('admin')),
);
?>

<h1>View Videos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'video_id',
		'video_title',
		'video_shortdescription',
		'video_description',
	),
)); ?>
