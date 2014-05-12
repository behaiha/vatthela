<?php
class Body_Header extends CWidget{
    public function init(){
        $model = Slideshow::model()->findAll();
        $this->render('body_header',array('model'=>$model));
    }
}
?>