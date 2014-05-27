<div class="prl-homepage-widget prl-panel">
    <h5 class="prl-block-title">Bài viết liên quan</h5>
    <div class="prl-grid prl-grid-divider">
        <?php foreach($model_cate as $cate):?>
        <?php $row = Articles::model()->findByPk($cate->table_id); ?>
        <?php $this->widget('Articles.components.Articles_OnePost',array('value'=>$row));?>	
        <?php endforeach;?>
    </div>
</div>  