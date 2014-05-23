<?php
class Articles_News extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->order='id DESC';
        $criteria->limit= 6;
        $model = Articles::model()->findAll($criteria);
        $this->render('articles_news',array('model'=>$model));
    }
}
?>