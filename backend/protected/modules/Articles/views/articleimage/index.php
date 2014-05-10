<?php
/* @var $this ArticleimageController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Article Images',
);

$this->menu=array(
	array('label'=>'Create ArticleImage', 'url'=>array('create')),
	array('label'=>'Manage ArticleImage', 'url'=>array('admin')),
);
?>

<h1>Article Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
