<?php
class Off_Canvas extends CWidget{
    public function init(){
        $menu = Menu::model()->findByAttributes(array('possition'=>'H'));        
        $this->render('off_canvas',array('menu'=>$menu));
    }
}
?>