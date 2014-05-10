<?php
/* @var $this ArticleimageController */
/* @var $model ArticleImage */

$this->breadcrumbs=array(
	'Article Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArticleImage', 'url'=>array('index')),
	array('label'=>'Manage ArticleImage', 'url'=>array('admin')),
);
?>

<h1>Create ArticleImage</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>