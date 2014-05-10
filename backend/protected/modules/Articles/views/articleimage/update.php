<?php
/* @var $this ArticleimageController */
/* @var $model ArticleImage */

$this->breadcrumbs=array(
	'Article Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ArticleImage', 'url'=>array('index')),
	array('label'=>'Create ArticleImage', 'url'=>array('create')),
	array('label'=>'View ArticleImage', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ArticleImage', 'url'=>array('admin')),
);
?>

<h1>Update ArticleImage <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>