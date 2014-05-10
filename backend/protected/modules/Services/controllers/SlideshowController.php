<?php

class SlideshowController extends Controller
{
	public function actionIndex()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
        $data = array();
        $criteria = new CDbCriteria;
        $criteria->limit = 5;
        $criteria->order='id DESC';
        $model = Slideshow::model()->findAll($criteria);
        foreach($model as $key=>$image){
            $data[$key] = Yii::app()->getBaseUrl(true).'/'.SLIDE_SHOW.$image->image;
        }
        if (isset($_GET['callback'])) {
			echo $_GET['callback'] . '(' . json_encode($data) . ');';
		}
	}
}