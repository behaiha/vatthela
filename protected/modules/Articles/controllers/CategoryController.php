<?php

class CategoryController extends Controller
{
	public function actionViewArticleOfCate($id)
	{
                $category = Categories::model()->findByPk($id);
                if ($category == null) {
                        throw new CHttpException(404,'The requested page does not exist.');
                }
                $seo_image = '/'.CATEGOGIES_IMAGE.$category->image;
                $seo_url = Yii::app()->request->requestUri;
            
                $seo_title = $category->seo_title;
                $seo_description =$category->seo_description;
                if ($category->seo_title == '') {
                        $seo_title = $category->title;
                        if (strlen($category->title) > 70) {
                            $seo_title = CutString($category->title,70);
                        }
                    }
                $this->setPageSeo($seo_title,$seo_description);
                $this->setOpenGraph($seo_title, $seo_description, $seo_image, $seo_url);
                $criteria = new CDbCriteria;
                $criteria->order='id DESC';
                $criteria->condition='category_id='.$id.' and "1" = "1"';
                        
                $count=CategoryRelation::model()->count($criteria);
                $pages=new CPagination($count);
                $pages->pageSize=10;
                $pages->applyLimit($criteria);
                	   	   
                $model = CategoryRelation::model()->findAll($criteria);
                                
                $this->render('view',array('model'=>$model,'pages'=>$pages,'category_id'=>$id));
	}
}