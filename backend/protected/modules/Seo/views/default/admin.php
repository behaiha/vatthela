<?php
/* @var $this DefaultController */
/* @var $model SeoTools */

$this->breadcrumbs=array(
	'Seo Tools'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SeoTools', 'url'=>array('index')),
	array('label'=>'Create SeoTools', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#seo-tools-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Seo Tools</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'seo-tools-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'description',
		'keywords',
		'metarobot',
		'type',
		/*
		'status',
		'create_date',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
