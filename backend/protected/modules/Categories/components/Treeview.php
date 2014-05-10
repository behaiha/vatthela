<?php

class Treeview extends CWidget
{
    public function init()
    {
        parent::init();
    }

    public function run(){
    	$parents = Categories::model()->findAll('parent_id = 0');
        $this->render('treeview',array('model'=>$parents));
    }
}

?>