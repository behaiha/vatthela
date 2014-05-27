<?php
class SearchController extends Controller{
    public function actionRsearch(){
        if(isset($_POST['keyword'])){
            $this->redirect(array('search','keyword'=>$_POST['keyword']));
        } 
    }
    
    public function actionSearch(){
        if(isset($_GET['keyword'])){
            $data = $_GET['keyword'];
            $term = (trim($data,'\"'));
            $term = "'%".$term."%'";
            $criteria = new CDbCriteria;
            $criteria->condition = "title LIKE ".$term;
            $criteria->order = 'id DESC';
            
    		$count=Articles::model()->count($criteria);
            $pages=new CPagination($count);
            $pages->pageSize=10;
            $pages->applyLimit($criteria);
    		$model = Articles::model()->findAll($criteria);
            $this->render('search',array('model'=>$model,'pages'=>$pages,'result'=>$data,'count'=>$count));
        }
    }
}
?>