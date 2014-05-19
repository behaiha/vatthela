<?php
/*
person: trieu nhu
 */

class DefaultController extends Controller
{
	/**
    	By Triệu nhữ@2014
    **/
	public function actionLoad()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
		if (isset($_GET['IdCategory']) && isset($_GET['DataArticles'])) {
			$dataId = $_GET['DataArticles'];
			$cid = $_GET['IdCategory'];
            $dataId = '('.substr($dataId, 0,-1).')';
			$criteria = new CDbCriteria;
            $criteria->join = "inner join category_relation cr on t.id = cr.table_id inner join categories ca on cr.category_id = ca.id";
            $criteria->condition ="ca.type ='A' and t.id not in (0)";
            $criteria->limit = 10;
            $model = Articles::model()->findAll($criteria);
            $arrs = array();
            foreach ($model as $key => $value) {
                $image = Yii::app()->theme->baseUrl.'/../'.$value->path.'thumbai_300/'.$value->image;
                $arrs[] = array(
                    'title'=>$value->title,
                    'short_description'=>$value->short_description,
                    'image'=>$image,
                    'link'=>Articles::getLinkArticles($value),
                    'figure'=>Articles::getNameFigure($value),
                );
            }
            echo CJSON::encode($arrs);
		}
	}
    
    /**
    By Trai Ngèo @2014
    **/
    public function actionView(){
        $this->layout="//layouts/view";
        $this->render('view');        
    } 
}