<?php 
class Videos_OnePost extends CWidget{
    public $model;
    public function init(){
        $this->render('videos_onepost',array('model'=>$this->model));
    }
}
?>