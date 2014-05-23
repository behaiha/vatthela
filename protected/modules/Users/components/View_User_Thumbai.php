<?php
class View_User_Thumbai extends CWidget{
    public $model;
    public function init(){
        $this->render('view_user_thumbai',array('model'=>$this->model));
    }
}
?>