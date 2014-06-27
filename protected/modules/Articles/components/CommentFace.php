<?php
class CommentFace extends CWidget{
    public $model;
    public function init(){
        $this->render('commentface',array('model'=>$this->model));
    }
}
?>