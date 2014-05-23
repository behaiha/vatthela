<?php
class Articles_DisplayHomeNews extends CWidget{
    public $model;
    public function init(){
        $this->render('articles_displayhomenews',array('model'=>$this->model));
    }
}
?>