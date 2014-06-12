<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria;
        $criteria->condition='active = 0 and "1" = "1"';
        $criteria->limit=10;
        $criteria->order="id DESC";
        
        $count=Videos::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        
        $model = Videos::model()->findAll($criteria);
        
		$this->render('index',array('model'=>$model,'pages'=>$pages));
	}
}