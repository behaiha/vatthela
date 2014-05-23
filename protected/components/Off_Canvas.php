<?php
class Off_Canvas extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->condition='parent_id=0 and "1" = "1"';
        $criteria->order='order_possition ASC';
        $model_parent_cate = Categories::model()->findAll($criteria);
        
        $criteria_menu = new CDbCriteria;
        $criteria_menu->order='order_possition ASC';
        $model_menu = Menus::model()->findAll($criteria_menu);
        
        $this->render('off_canvas',array('model_parent_cate'=>$model_parent_cate,'model_menu'=>$model_menu));
    }
}
?>