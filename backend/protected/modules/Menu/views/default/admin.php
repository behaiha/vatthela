<?php
/* @var $this DefaultController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Menu', 'url'=>array('create')),
);
?>

<h1>Manage Menus</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'status',
		'possition',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
