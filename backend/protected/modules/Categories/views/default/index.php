<div class="span-19">
	<div id="content">
		
<?php
/* @var $this DefaultController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#categories-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<div id="all_categories">
	<h1>Quản lý danh mục chính</h1>
	<?php echo CHtml::link("Thêm loại danh mục này",Yii::app()->createUrl('Categories/default/create',array('check'=>0))); ?>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'categories-grid',
		'dataProvider'=>$model,
		'columns'=>array(
			'id',
			'title',
			'description',
			'order_possition',
			array(
				'class'=>'CButtonColumn',
			),
		),
	)); ?>
</div>
</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operations',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
		$this->widget('Categories.components.Treeview');
	?>
	</div><!-- sidebar -->
</div>
