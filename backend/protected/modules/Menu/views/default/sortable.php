<ol class="sortable views">
  <?php 
      $modelMenu = MenuRelation::model(); 
      echo $modelMenu->getChildValue($model->menuParents);
  ?>
</ol>