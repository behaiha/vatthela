<?php

class CategoryWidget extends CWidget
{
    public $model;
    public $type ='A';
    public function init()
    {

        $parents = Categories::model()->findAll('parent_id = 0 and type ="'.$this->type.'"');
        $this->render('category',array('parents'=>$parents));
    }
}

?>