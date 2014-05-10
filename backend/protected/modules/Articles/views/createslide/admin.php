<?php
/* @var $this CreateslideController */
/* @var $model GameImage */

$this->breadcrumbs=array(
	//'Game Images'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ArticleImage', 'url'=>array('index','id'=>$model_article->id)),
	array('label'=>'Upload ảnh slidershow', 'url'=>array('create','id'=>$model_article->id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#article-image-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1>Danh sách image của bài viết: <?php echo $model_article->title;?></h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'article-image-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'article_id',
            'value'=>'Articles::model()->getTitle($data->article_id)',
        ),
		array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'Articles::model()->getImageSlide($data)',
 
        ),
		'alt',
        'path',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
