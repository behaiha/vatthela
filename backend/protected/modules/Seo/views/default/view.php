<?php
/* @var $this DefaultController */
/* @var $model SeoTools */

$this->breadcrumbs=array(
	'Seo Tools'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SeoTools', 'url'=>array('index')),
	array('label'=>'Create SeoTools', 'url'=>array('create')),
	array('label'=>'Update SeoTools', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SeoTools', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SeoTools', 'url'=>array('admin')),
);
?>

<h1>View SeoTools #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'description',
		'keywords',
		'metarobot',
		'type',
		'status',
		'create_date',
	),
)); ?>
