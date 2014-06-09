<?php
class Nav extends CWidget{
    public function init(){
        
        $criteria = new CDbCriteria;
        $criteria->condition='parent_id=0 and "1" = "1"';
        $criteria->order='order_possition ASC';
        $model_parent_cate = Categories::model()->findAll($criteria);
        
        $menu = Menu::model()->findByAttributes(array('possition'=>'H'));
        
        $criteria_news = new CDbCriteria;
        $criteria_news->order='id DESC';
        $criteria_news->limit = 4;
        $model_news = Articles::model()->findAll($criteria_news);
        
        $this->render('nav',array('model_parent_cate'=>$model_parent_cate,'menu'=>$menu,'model_news'=>$model_news));
    }
}
?>