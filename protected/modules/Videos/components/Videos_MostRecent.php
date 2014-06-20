<?php
class Videos_MostRecent extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->order = 'id DESC';
        $criteria->limit = 1;
        $model = Videos::model()->findAll($criteria);
        $this->render('videos_mostrecent',array('model'=>$model));
        
    }
}  
?>