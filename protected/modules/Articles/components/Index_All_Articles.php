<?php
class Index_All_Articles extends CWidget{
	public $limit = 10;
    public function init(){
    	$criteria = new CDbCriteria;
    	$criteria->join = "inner join category_relation cr on t.id = cr.table_id inner join categories ca on cr.category_id = ca.id";
    	$criteria->condition ="ca.type ='A'";
    	$criteria->order = "id desc";
    	$criteria->limit = $this->limit;
    	$model = Articles::model()->findAll($criteria);
        $this->render('index_all_articles',array('model'=>$model));
    }
}
?>