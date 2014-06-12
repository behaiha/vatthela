<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Create Ads', 'url'=>array('create')),
	array('label'=>'Update Ads', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ads', 'url'=>array('admin')),
);
?>

<h1>View Ads #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'start_time',
		'end_time',
		//'possition',
        array(
            'label'=>'Vị trí đặt',
            'value'=>Ads::model()->getPossition($model->possition),
            'type'=>'raw',
        ),
		array(
            'label'=>'Loại',
            'value'=>Ads::model()->getType($model->type),
        ),
		//'url_link',
        array(
            'label'=>'URL link',
            'value'=>formatContent($model->url_link),
        ),
        array(        
            'type'=>'raw',
            'name'=>'image',
            'value'=> CHtml::image(Yii::app()->request->baseUrl.'/'.$model->path.$model->image,'',array('style'=>'width:200px')),
            'htmlOptions'=>array('style'=>'width : 200px'),

        ),
        array(
            'label'=>'Mở tại',
            'value'=>Ads::model()->getIsCurrentPage($model->isCurrentPage),
        ),
		'_order',
	),
)); ?>
