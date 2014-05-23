<?php

class CategoryController extends Controller
{
	public function actionViewArticleOfCate($id)
	{
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