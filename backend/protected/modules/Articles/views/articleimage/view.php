<?php
/* @var $this ArticleimageController */
/* @var $model ArticleImage */

$this->breadcrumbs=array(
	'Article Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ArticleImage', 'url'=>array('index')),
	array('label'=>'Create ArticleImage', 'url'=>array('create')),
	array('label'=>'Update ArticleImage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticleImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticleImage', 'url'=>array('admin')),
);
?>

<h1>View ArticleImage #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'article_id',
		'image',
		'alt',
	),
)); ?>
