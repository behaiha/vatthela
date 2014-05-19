<?php
/*
person: trieu nhu
 */

class DefaultController extends Controller
{
	public function actionLoad()
	{
		$criteria = new CDbCriteria;
    	$criteria->join = "inner join category_relation cr on t.id = cr.table_id inner join categories ca on cr.category_id = ca.id";
    	$criteria->condition ="ca.type ='A'";
    	$criteria->limit = 1;
    	$model = Articles::model()->findAll($criteria);
        $this->renderPartial('load',array('model'=>$model));
	}
    
    /**
    By Trai Ngèo @2014
    **/
    public function actionView(){
        $this->layout="//layouts/view";
        $this->render('view');        
    } 
}