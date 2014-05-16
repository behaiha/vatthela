<?php
class Index_One_Articles extends CWidget{
	public $value;
    public function init(){
        $this->render('index_one_articles',array('value'=>$this->value));
    }
}
?>