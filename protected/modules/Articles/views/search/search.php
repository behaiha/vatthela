<section id="main" class="prl-span-9">          
   <div class="prl-homepage-widget">
    <h5 class="prl-block-title alizarin">Search: <?php echo $result;?></h5>
        <ul class="prl-list-category">
            <?php if($model === null){?>
                <p>Không có k?t qu? nào</p>
            <?php }else{
            ?>
                <?php foreach($model as $row):?>
                    <?php $this->widget('Articles.components.Cate_OnePost',array('value'=>$row));?>
                <?php endforeach;?>   
            <?php }?>                     
                   
        </ul>    
     </div>   
     <?php 
        $this->widget('CLinkPager', array(
            'pages' => $pages,
        ));
     ?> 
</section>