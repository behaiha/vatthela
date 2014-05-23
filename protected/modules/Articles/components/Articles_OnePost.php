<?php
class Articles_OnePost extends CWidget{
	public $value;
    public function init(){
        $this->render('articles_onepost',array('row'=>$this->value));
    }
}
?>