<?php
/* @var $this CreateslideController */
/* @var $model ArticlesImage */

$this->breadcrumbs=array(
	'Articles Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ArticlesImage', 'url'=>array('index','id'=>$model_article->id)),
	array('label'=>'Manage ArticlesImage', 'url'=>array('admin','id'=>$model_article->id)),
);
?>

<h1>Create ArticlesImage</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>