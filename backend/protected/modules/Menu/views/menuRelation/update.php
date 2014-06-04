<?php
/* @var $this MenuRelationController */
/* @var $model MenuRelation */

$this->breadcrumbs=array(
	'Menu Relations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MenuRelation', 'url'=>array('index')),
	array('label'=>'Create MenuRelation', 'url'=>array('create')),
	array('label'=>'View MenuRelation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage MenuRelation', 'url'=>array('admin')),
);
?>

<h1>Update MenuRelation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>