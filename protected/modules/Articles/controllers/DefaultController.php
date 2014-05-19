<?php
/*
person: trieu nhu
 */

class DefaultController extends Controller
{
	public function actionLoad()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		$criteria = new CDbCriteria;
    	$criteria->join = "inner join category_relation cr on t.id = cr.table_id inner join categories ca on cr.category_id = ca.id";
    	$criteria->condition ="ca.type ='A'";
    	$criteria->limit = 1;
    	$model = Articles::model()->findAll($criteria);
    	$arrs = array();
    	foreach ($model as $key => $value) {
    		$image = Yii::app()->theme->baseUrl.'/../'.$value->path.'thumbai_300/'.$value->image;
    		$arrs[] = array(
    			'title'=>$value->title,
    			'short_description'=>$value->short_description,
    			'image'=>$image,
    		);
    	}
    	echo CJSON::encode($arrs);
        // $this->renderPartial('load',array('model'=>$model));
	}
}