<nav id="nav" class="prl-navbar" role="navigation">
	<div class="nav-wrapper">
		<div class='nav-container clearfix'>
			<ul class="sf-menu" id="sf-menu">
				<li class="menu_item-home current"><a href="<?php echo Yii::app()->createUrl('/Articles/default'); ?>"><i class="fa fa-home"></i>Trang chủ</a>
			
                <?php foreach($model_parent_cate as $row_parent_cate):?>
                <li>
                	<a href="<?php echo Categories::model()->getURL($row_parent_cate);?>"><i class="fa fa-file-text"></i><?php echo $row_parent_cate->title;?></a>
                	<?php if(count($row_parent_cate->children) != 0):?>
                    <ul class="sf-list">
                		<?php foreach($row_parent_cate->children as $row_children_cate):?>
                		<li><a href="<?php echo Categories::model()->getURL($row_children_cate);?>"><?php echo $row_children_cate->title;?></a></li>
                		<?php endforeach;?>
                	</ul>
                    <?php endif;?>
                </li>
                <?php endforeach;?>
                
                <?php foreach($model_menu as $row):?>
                    <li><a href="<?php echo $row->link; ?>"><i class="fa fa-smile-o"></i><?php echo $row->name;?></a></li>
                <?php endforeach;?>	
                
                
                <li class="sf-mega-parent"><a href="index.php"><i class="fa fa-flag"></i>Tin nhanh</a>
					<div class="sf-mega">
						<div class="prl-grid prl-grid-divider">
							<?php foreach($model_news as $news):?>
                                <?php $this->widget('Articles.components.Tinnhanh_OnePost',array('value'=>$news));?>
                            <?php endforeach;?>
						</div>	
					</div>
				</li>
				 
			</ul>

			<a href="#" class="prl-nav-toggle prl-nav-menu" title="Nav" data-prl-offcanvas="{target:'#offcanvas'}"></a>
			<div class="prl-nav-flip">
				<a href="#" class="prl-nav-toggle prl-nav-toggle-search" title="Search" data-prl-offcanvas="{target:'#offcanvas-search'}"></a>
			</div>
		</div>	
	</div><!-- nav-wrapper -->	
</nav>