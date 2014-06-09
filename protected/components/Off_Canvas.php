<?php
class Off_Canvas extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->condition='parent_id=0 and "1" = "1"';
        $criteria->order='order_possition ASC';
        $model_parent_cate = Categories::model()->findAll($criteria);
        
        $menu = Menu::model()->findByAttributes(array('possition'=>'H'));
        
        $this->render('off_canvas',array('model_parent_cate'=>$model_parent_cate,'menu'=>$menu));
    }
}
?>