<div class="prl-homepage-widget">
    <h5 class="prl-block-title alizarin">Tin mới nhất  <span class="prl-block-title-link right"><a href="<?php echo Articles::model()->getArticlenewURL();?>">XEM TẤT CẢ <i class="fa fa-caret-right"></i></a></span></h5>
    <div class="prl-grid prl-grid-divider">
    <?php foreach($model as $key=>$row):?>
        <?php if($key % 3 == 0 and $key != 0):?>
            </div>
            <div class="prl-grid prl-grid-divider">
            <hr class="prl-grid-divider">
        <?php endif?>
        <?php $this->widget('Articles.components.Articles_OnePost',array('value'=>$row));?>
        
    <?php endforeach;?>
     </div>
</div>