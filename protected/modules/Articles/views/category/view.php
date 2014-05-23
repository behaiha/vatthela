<section id="main" class="prl-span-9">          
   <div class="prl-homepage-widget">
    <h5 class="prl-block-title alizarin"><?php echo Categories::model()->getName($category_id);?></h5>
        <ul class="prl-list-category">                     
            <?php foreach($model as $row):?>
                <?php $model_a = Articles::model()->findByPk($row->table_id);?>
                <?php $this->widget('Articles.components.Cate_OnePost',array('value'=>$model_a));?>
            <?php endforeach;?>          
        </ul>    
     </div>   
     <?php 
        $this->widget('CLinkPager', array(
            'pages' => $pages,
        ));
     ?> 
</section>






