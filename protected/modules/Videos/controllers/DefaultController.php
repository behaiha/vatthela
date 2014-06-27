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
    
    public function actionView($id){
        $model = Videos::model()->findByPk($id);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $view_old = $model->view;
            $view_new = $view_old + 1;
            $model->view = $view_new;
            if($model->save(false)){
                $this->render('view',array('model'=>$model));    
            }
            
        }
    }
    
    public function actionViewmost(){
        $criteria = new CDbCriteria;
        $criteria->order='view DESC';
                
        $count=Videos::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
         
        $model = Videos::model()->findAll($criteria);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $this->render('viewmost',array('model'=>$model,'pages'=>$pages));
        }
    }
}