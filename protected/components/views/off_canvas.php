<div id="offcanvas" class="prl-offcanvas">
	<div class="prl-offcanvas-bar prl-offcanvas-bar-show">
		<nav class="side-nav">
			<ul class="nav-list">
                <li class="nav-item">
    				<a href="<?php echo Yii::app()->createUrl('/Articles/default'); ?>">Trang chủ</a>
    			</li>
                <?php foreach($model_parent_cate as $row_parent_cate):?>
				<li class="nav-item">
                    <?php if(count($row_parent_cate->children) != 0):?>
                    <span class="nav-click"></span>
                    <?php endif;?>
					<a href="<?php echo Categories::model()->getURL($row_parent_cate);?>"><?php echo $row_parent_cate->title;?></a>
					<?php if(count($row_parent_cate->children) != 0):?>
                    <ul class="nav-submenu">
                        <?php foreach($row_parent_cate->children as $row_children_cate):?>
						<li class="nav-submenu-item">
							<a href="<?php echo Categories::model()->getURL($row_children_cate);?>"><?php echo $row_children_cate->title;?></a>
						</li>
						<?php endforeach;?>
					</ul>
                    <?php endif;?>
				</li>
                <?php endforeach;?>
                
                 <?php foreach($model_menu as $row):?>
                    <li class="nav-item">
                        <a href="<?php echo $row->link; ?>"><?php echo $row->name;?></a>
                    </li>
                <?php endforeach;?>	

			</ul>
		</nav>
		
</div></div>