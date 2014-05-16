<?php
class Index_Articles_Category extends CWidget{
    public function init(){
    	$criteria = new CDbCriteria;
    	$criteria->condition = "type = 'A'";
    	$model = Categories::model()->findAll($criteria);
        $this->render('index_articles_categotry',array('model'=>$model));
    }
}
?>