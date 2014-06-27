<?php
/* @var $this DefaultController */
/* @var $model SeoTools */

$this->breadcrumbs=array(
	'Seo Tools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SeoTools', 'url'=>array('index')),
	array('label'=>'Manage SeoTools', 'url'=>array('admin')),
);
?>

<h1>Create SeoTools</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>