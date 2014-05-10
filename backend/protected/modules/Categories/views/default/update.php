<?php
/* @var $this DefaultController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'View Categories', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>Update Categories <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>