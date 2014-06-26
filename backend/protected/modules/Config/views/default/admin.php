<?php
/* @var $this DefaultController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Config', 'url'=>array('index')),
	array('label'=>'Create Config', 'url'=>array('create')),
	array('label'=>'Create logo', 'url'=>array('logo')),
);
?>

<h1>Manage Configs</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'config-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'value',
		'status',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
