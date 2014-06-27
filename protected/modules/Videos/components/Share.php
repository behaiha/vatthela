<?php
class Share extends CWidget{
    public $model;
    public function init(){
        $this->render('share',array('model'=>$this->model));
    }
}
?>