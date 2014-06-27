<?php
class Comment extends CWidget{
    public $model;
    public function init(){
        $this->render('comment',array('model'=>$this->model));
    }
}
?>