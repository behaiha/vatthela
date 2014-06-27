<?php
/* @var $this DefaultController */
/* @var $model SeoTools */

$this->breadcrumbs=array(
	'Seo Tools'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SeoTools', 'url'=>array('index')),
	array('label'=>'Create SeoTools', 'url'=>array('create')),
	array('label'=>'View SeoTools', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SeoTools', 'url'=>array('admin')),
);
?>

<h1>Update SeoTools <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>