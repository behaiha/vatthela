<?php
/* @var $this AdsController */
/* @var $model Ads */

$this->breadcrumbs=array(
	'Ads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Ads', 'url'=>array('index')),
	array('label'=>'Create Ads', 'url'=>array('create')),
);
?>

<h1>Manage Ads</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ads-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
         array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'Ads::model()->getImage($data)',
 
        ),
        array(
            'name'=>'mobile',
            'type'=>'html',
            'value'=>'Ads::model()->getTypeAds($data->mobile)',
            'filter'=>array('0'=>'Desktop','1'=>'Mobile'),
        ),
        'title',
		'start_time',
		'end_time',
		//'possition',
        array(
            'name'=>'possition',
            'value'=>'Ads::model()->getPossition($data->possition)',
            'filter'=>array('1'=>'Top','2'=>'Bottom','3'=>'Left','4'=>'Right','5'=>'Center'),
        ),
		//'type',
        array(
            'name'=>'type',
            'value'=>'Ads::model()->getType($data->type)',
            'filter'=>array('1'=>'Image','2'=>'Flash','3'=>'Slide show'),
        ),
		'url_link',
		//'isCurrentPage',
        array(
            'name'=>'isCurrentPage',
            'value'=>'Ads::model()->getIsCurrentPage($data->isCurrentPage)',
            'filter'=>array('1'=>'Mở tại trang','2'=>'Mở ở trang khác'),
        ),
		'_order',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
