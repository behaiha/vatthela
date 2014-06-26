<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria;
        $criteria->condition='type="A" and parent_id = 0 and "1" = "1"';
        $model = Categories::model()->findAll($criteria);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $this->render('index',array('model'=>$model));
        }
	}
    
    
    public function actionView($id){
        $model = Articles::model()->findByPk($id);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $seo_image = '/'.formatPath($model->path).'thumbai_300/'.$model->image;
            $seo_url = Yii::app()->request->requestUri;
            
            $seo_title = $model->seo_title;
            $seo_description =$model->seo_description;
            if ($model->seo_title == '') {
                $seo_title = $model->title;
                if (strlen($model->title) > 70) {
                    $seo_title = CutString($model->title,70);
                }
            }
            $this->setPageSeo($seo_title,$seo_description);
            $this->setOpenGraph($seo_title, $seo_description, $seo_image, $seo_url);
            $view_old = $model->view;
            $view_new = $view_old + 1;
            $model->view = $view_new;
            if($model->save(false)){
                $this->render('view',array('model'=>$model));    
            }
            
        }
    }
    
    public function actionArticlesnew(){
        $criteria = new CDbCriteria;
        $criteria->order='id DESC';
        
        $count=Articles::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
        
        $model = Articles::model()->findAll($criteria);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $this->render('articlesnew',array('model'=>$model,'pages'=>$pages));
        }
        
    }
    
    public function actionViewmost(){
        $criteria = new CDbCriteria;
        $criteria->order='view DESC';
                
        $count=Articles::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
         
        $model = Articles::model()->findAll($criteria);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $this->render('viewmost',array('model'=>$model,'pages'=>$pages));
        }
    }
    
    public function actionError(){
        $this->render('error');
    }
}