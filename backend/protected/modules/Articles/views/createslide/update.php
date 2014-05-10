<?php
/* @var $this CreateslideController */
/* @var $model ArticlesImage */

$this->breadcrumbs=array(
	'Articles Images'=>array('admin','id'=>$model->article_id),
    $model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticlesImage', 'url'=>array('index','id'=>$model->article_id)),
	array('label'=>'Create ArticlesImage', 'url'=>array('create','id'=>$model->article_id)),
	array('label'=>'View ArticlesImage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticlesImage', 'url'=>array('admin','id'=>$model->article_id)),
);
?>

<h1>Update Image</h1>

<?php $this->renderPartial('_oneupdate', array('model'=>$model)); ?>