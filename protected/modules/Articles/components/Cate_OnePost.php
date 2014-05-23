<?php
class Cate_OnePost extends CWidget{
	public $value;
    public function init(){
        $this->render('cate_onepost',array('row'=>$this->value));
    }
}
?>