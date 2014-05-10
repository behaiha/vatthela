<?php
/* @var $this CreateslideController */
/* @var $model ArticlesImage */

$this->breadcrumbs=array(
	'Articles Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ArticlesImage', 'url'=>array('index','id'=>$model->article_id)),
	array('label'=>'Create ArticlesImage', 'url'=>array('create','id'=>$model->article_id)),
	array('label'=>'Update ArticlesImage', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ArticlesImage', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ArticlesImage', 'url'=>array('admin','id'=>$model->article_id)),
);
?>

<h1>Image của Articles</h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(
            'label'=>'Articles',
            'value'=>Articles::model()->getTitle($model->article_id),
        ),
		array(
            'type'=>'raw',
            'label'=>'Image',
            'value'=>Articles::model()->getImageSlide($model),
        ),
		'alt',
		'path',
	),
)); ?>
