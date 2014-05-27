<?php
class Articles_MostView extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->order='view DESC';
        $criteria->limit=3;
        $model = Articles::model()->findAll($criteria);
        $this->render('articles_mostview',array('model'=>$model));
    }
}
?>