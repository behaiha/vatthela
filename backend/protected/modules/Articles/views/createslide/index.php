<?php
/* @var $this CreateslideController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Articles Images',
);

$this->menu=array(
	array('label'=>'Create ArticlesImage', 'url'=>array('create','id'=>$model_article->id)),
	array('label'=>'Manage ArticlesImage', 'url'=>array('admin','id'=>$model_article->id)),
);
?>

<h1>Danh sách image của Articles: <?php echo $model_article->title;?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
