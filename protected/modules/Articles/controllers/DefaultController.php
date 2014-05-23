<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria;
        $criteria->condition='type="A" and parent_id = 0 and "1" = "1"';
        $model = Categories::model()->findAll($criteria);
        $this->render('index',array('model'=>$model));
	}
    
    public function actionArticlesnew(){
        $criteria = new CDbCriteria;
        $criteria->order='id DESC';
        
        $count=Articles::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        
        $model = Articles::model()->findAll($criteria);
        $this->render('articlesnew',array('model'=>$model,'pages'=>$pages));
        
    }
    
    public function actionError(){
        $this->render('error');
    }
}