<?php
class Videos_MostView extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->order='view DESC';
        $criteria->limit=5;
        $model = Videos::model()->findAll($criteria);
        $this->render('videos_mostview',array('model'=>$model));
    }
}
?>