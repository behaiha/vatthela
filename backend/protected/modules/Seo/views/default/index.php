<?php
/* @var $this DefaultController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Seo Tools',
);

$this->menu=array(
	array('label'=>'Create SeoTools', 'url'=>array('create')),
	array('label'=>'Manage SeoTools', 'url'=>array('admin')),
);
?>

<h1>Seo Tools</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
