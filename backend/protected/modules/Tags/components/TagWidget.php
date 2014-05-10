<?php

class TagWidget extends CWidget
{
    public $model;
    public $type = 'A';
    public $form;
    public function init()
    {
        parent::init();
    }

    public function run(){
    	$value = '';
        $tags = Tags::model()->findAll();
    	if (isset($this->model->id)) {
    		$value = TagConnect::model()->getTags($this->model->id,$this->type);
    	}
        $this->render('tags',array('value'=>$value,'tags'=>$tags));
    }
}

?>