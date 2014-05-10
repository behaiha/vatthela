<?php
/* @var $this SlideshowController */
/* @var $model Slideshow */

$this->breadcrumbs=array(
	'Slideshows'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Slideshow', 'url'=>array('index')),
	array('label'=>'Create Slideshow', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#slideshow-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Slideshows</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
$parents = Categories::model()->findAll('parent_id = 0');
$data = Categories::model()->makeDropDown($parents);
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slideshow-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'Slideshow::model()->getImageSlide($data)',
 
        ),
        'alt',
        array(
            'name'=>'category_id',
            'value'=>'Categories::model()->getName($data->category_id)',
            'filter'=>$data,
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
