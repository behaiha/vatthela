<?php 
class Articles_ViewTag extends CWidget{
    public $model; // model of article
    public function init(){
        $this->render('articles_viewtag',array('model'=>$this->model));
    }
}
?>