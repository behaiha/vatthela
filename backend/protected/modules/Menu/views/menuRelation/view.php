<?php
/* @var $this MenuRelationController */
/* @var $model MenuRelation */

$this->breadcrumbs=array(
	'Menu Relations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MenuRelation', 'url'=>array('index')),
	array('label'=>'Create MenuRelation', 'url'=>array('create')),
	array('label'=>'Update MenuRelation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MenuRelation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MenuRelation', 'url'=>array('admin')),
);
?>

<h1>View MenuRelation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'menu_id',
		'table_id',
		'table_name',
		'possition',
		'text',
		'parent_id',
	),
)); ?>
