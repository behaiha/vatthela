<nav id="nav" class="prl-navbar" role="navigation">
	<div class="nav-wrapper">
		<div class='nav-container clearfix'>
			<ul class="sf-menu" id="sf-menu">
                <?php foreach($menu->allMenus as $row):?>
                    <li><a href="<?php MenuRelation::getLink($row); ?>"><?php echo $row->text;?></a>
						<?php if($row->childrens != null): ?>
							<ul class="sf-list">
		                		<?php foreach($row->childrens as $row_children_cate):?>
		                		<li><a href="<?php MenuRelation::getLink($row_children_cate);?>"><?php echo $row_children_cate->text;?></a></li>
		                		<?php endforeach;?>
		                	</ul>
						<?php endif; ?>
                    </li>
                <?php endforeach;?>	
			</ul>

			<a href="#" class="prl-nav-toggle prl-nav-menu" title="Nav" data-prl-offcanvas="{target:'#offcanvas'}"></a>
			<div class="prl-nav-flip">
				<a href="#" class="prl-nav-toggle prl-nav-toggle-search" title="Search" data-prl-offcanvas="{target:'#offcanvas-search'}"></a>
			</div>
		</div>	
	</div><!-- nav-wrapper -->	
</nav>
 <script>
	$(function () {
		var example = $('#sf-menu').superfish({
			delay:       400,
			animation:   {opacity:'show',height:'show'},
			speed:       'fast', 
			autoArrows:  false
		});
		
	});
</script>