<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
        $criteria = new CDbCriteria;
        $criteria->condition='active = 0 and "1" = "1"';
        $criteria->limit=10;
        $criteria->order="id DESC";
        $seo = SeoTools::model()->findByAttributes(array('type'=>'AllVideo'));
        if ($seo != null) {
            $this->setPageSeo($seo->title,$seo->description,$seo->keywords,$seo->metarobot);
        }
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
            $seo_image =$model->video_image;
            $seo_url = Yii::app()->request->requestUri;
            
            $seo_title = $model->video_title;
            $video_shortdescription =$model->video_shortdescription;
            if ($model->video_title == '') {
                $video_title = $model->video_title;
                if (strlen($model->video_title) > 70) {
                    $video_title = CutString($model->video_title,70);
                }
            }
            $this->setPageSeo($seo_title,$video_shortdescription);
            $this->setOpenGraph($seo_title, $video_shortdescription, $seo_image, $seo_url);
            $view_old = $model->view;
            $view_new = $view_old + 1;
            $model->view = $view_new;
            if($model->save(false)){
                $this->render('view',array('model'=>$model));    
            }
            
        }
    }
}