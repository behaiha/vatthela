<?php
/* @var $this DefaultController */
/* @var $model Articles */

$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Articles', 'url'=>array('index')),
	array('label'=>'Create Articles', 'url'=>array('create')),
	array('label'=>'Update Articles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Articles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Articles', 'url'=>array('admin')),
);
?>

<h1>View Articles #<?php echo $model->id; ?></h1>
<div class="row">
    <label><b>Tiêu đề: </b></label><span><b style="color: #0080FF;"><?php echo $model->title;?></b></span><br /><br />
    <label><b>Nội dung chính: </b></label><span><b style="color: #0080C0;"><?php echo $model->short_description;?></b></span><br /><br />

    <?php 
        $image = '';
         if ($model->image != '' and $model->path != '') {
                $image = Yii::app()->request->baseUrl.'/'.$model->path.'thumbai_300/'.$model->image;
            }
     ?>
      <div>
            <img src="<?php echo $image; ?>" id='image' width='200px'>
        </div>
    <label><b>Nội dung: </b></label><br /><p><?php echo formatContent($model->description);?></p>
    <div class="clearfix"></div>
    <label><b>Category: </b></label><span><?php echo Articles::model()->getCategory($model);?></span><br /><br />
    <label><b>Tags: </b></label><span><?php echo TagConnect::model()->getTags($model->id,'A');?></span><br /><br />
    <label><b>Ngày tạo: </b></label><span><?php echo $model->create_date;?></span><br /><br />
    <label><b>Ngày update: </b></label><span><?php echo $model->update_date;?></span><br /><br />
</div>
<div class="row">
    <label><b>Seo title: </b></label><span><?php echo $model->seo_title;?></span><br /><br />
    <label><b>Seo description: </b></label><span><?php echo $model->seo_description;?></span><br /><br />
    <label><b>Người tạo: </b></label><span style="color: red;"><?php echo Users::model()->getName($model->user_id);?></span><br />
</div>
