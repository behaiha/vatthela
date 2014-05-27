<?php
class TagController extends Controller{
    public function actionTaglist($id){
        $criteria = new CDbCriteria;
        $criteria->order='table_id DESC';
        $criteria->condition='tag_id='.$id.' and "1" = "1"';
                
        $count=TagConnect::model()->count($criteria);
        $pages=new CPagination($count);
        $pages->pageSize=10;
        $pages->applyLimit($criteria);
         
        $model = TagConnect::model()->findAll($criteria);
        if($model === null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
            $this->render('list',array('model'=>$model,'pages'=>$pages,'tag_id'=>$id));
        }
    }
}
?>