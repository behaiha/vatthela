<?php
class Videos_DisplayHome extends CWidget{
    public function init(){
        $criteria = new CDbCriteria;
        $criteria->condition='active = 0 and "1" = "1"';
        $criteria->limit=5;
        $criteria->order="id DESC";
        $model = Videos::model()->findAll($criteria);
        $this->render('videos_displayhome',array('model'=>$model));
    }
}
?>