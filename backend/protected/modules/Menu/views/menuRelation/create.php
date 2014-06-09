<?php
/* @var $this MenuRelationController */
/* @var $model MenuRelation */

$this->breadcrumbs=array(
	'Menu Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MenuRelation', 'url'=>array('index')),
	array('label'=>'Manage MenuRelation', 'url'=>array('admin')),
);
?>

<h1>Create MenuRelation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>