<div id="offcanvas" class="prl-offcanvas">
	<div class="prl-offcanvas-bar prl-offcanvas-bar-show">
		<nav class="side-nav">
			<ul class="nav-list">                
                <?php foreach($menu->allMenus as $row):?>
                    <li class="nav-item"><a href="<?php MenuRelation::getLink($row); ?>"><?php echo $row->text;?></a>
                        <?php if($row->childrens != null): ?>
                            <ul class="nav-submenu">
                                <?php foreach($row->childrens as $row_children_cate):?>
                                <li class="nav-submenu-item"><a href="<?php MenuRelation::getLink($row);?>"><?php echo $row_children_cate->text;?></a></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach;?>   
			</ul>
		</nav>
    </div>
</div>