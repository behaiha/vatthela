<section id="main" class="prl-span-9">          
   <div class="prl-homepage-widget">
    <h5 class="prl-block-title alizarin">Tin mới nhất</h5>
        <ul class="prl-list-category">                     
            <?php foreach($model as $row):?>
                <?php $this->widget('Articles.components.Cate_OnePost',array('value'=>$row));?>
            <?php endforeach;?>          
        </ul>    
     </div>   
     <?php 
        $this->widget('CLinkPager', array(
            'pages' => $pages,
        ));
     ?> 
</section>