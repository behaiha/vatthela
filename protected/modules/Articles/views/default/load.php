<?php 
        foreach ($model as $value) { 
            $this->widget('Articles.components.Index_One_Articles',array('value'=>$value));
        }
    ?>  