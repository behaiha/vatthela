<?php
class Slide extends CWidget{
    public function init(){
        $model = SlideShow::model()->findAll();
        $this->render('slide',array('model'=>$model));
    }
}
?>