<?php
/* @var $this MenuRelationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Menu Relations',
);

$this->menu=array(
	array('label'=>'Create MenuRelation', 'url'=>array('create')),
	array('label'=>'Manage MenuRelation', 'url'=>array('admin')),
);
?>

<h1>Menu Relations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
