<?php
class Nav extends CWidget{
    public function init(){
        
        $criteria = new CDbCriteria;
        $criteria->condition='parent_id=0 and "1" = "1"';
        $criteria->order='order_possition ASC';
        $model_parent_cate = Categories::model()->findAll($criteria);
        
        $criteria_menu = new CDbCriteria;
        $criteria_menu->order='order_possition ASC';
        $model_menu = Menus::model()->findAll($criteria_menu);
        
        $criteria_news = new CDbCriteria;
        $criteria_news->order='id DESC';
        $criteria_news->limit = 4;
        $model_news = Articles::model()->findAll($criteria_news);
        
        $this->render('nav',array('model_parent_cate'=>$model_parent_cate,'model_menu'=>$model_menu,'model_news'=>$model_news));
    }
}
?>