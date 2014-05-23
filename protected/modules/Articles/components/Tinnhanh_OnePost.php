<?php
class Tinnhanh_OnePost extends CWidget{
	public $value;
    public function init(){
        $this->render('tinnhanh_onepost',array('row'=>$this->value));
    }
}
?>