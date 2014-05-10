<?php
/* @var $this DefaultController */
/* @var $model Articles */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Articles', 'url'=>array('create')),
);
?>

<h1>Manage Articles</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'articles-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'name'=>'image',
            'type'=>'html',
            'value'=>'Articles::model()->getImage($data)',
 
        ),
		'title',
        array(
            'name'=>'hot',
            'value'=>'Articles::model()->getHot($data->hot)',
            'filter'=>array('0'=>'Bình thường','1'=>'Hot'),
        ),
        'endhot_date',
        
        array(
            'name'=>'active',
            'value'=>'Articles::model()->getActive($data->active)',
            'filter'=>array('0'=>'Không sử dụng','1'=>'Sử dụng'),
        ),
        array(
            'name'=>'user_id',
            'value'=>'Users::model()->getName($data->user_id)',
        ),
        array(
            'name'=>'category',
            'value'=>'Articles::model()->getCategory($data)',
 
        ),
        'create_date',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}{up-file}{up-image}',
            'buttons'=>array
            (
                'up-file' => array
                (
                    'label'=>'Upload file game',
                    'imageUrl'=>Yii::app()->theme->baseUrl.'/images/up.gif',
                    'url'=>'Yii::app()->createUrl("/Articles/Articlefile/admin", array("id"=>$data->id))',
                    'options'=>array('class'=>'i-con' ),
                ),
                'up-image' => array(
                    'label'=>'Upload image',
                    'imageUrl'=>Yii::app()->theme->baseUrl.'/images/up-image.png',
                    'url'=>'Yii::app()->createUrl("/Articles/createslide/admin", array("id"=>$data->id))',
                    'options'=>array('class'=>'i-con' ),
                    
                ),
            ),
		),
	),
)); ?>
<style>
.i-con img {
    width: 20px;
}
</style>
