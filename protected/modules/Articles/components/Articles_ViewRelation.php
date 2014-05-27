<?php
class Articles_ViewRelation extends CWidget{
    public $model;
    public function init(){
        $input = CategoryRelation::model()->getCategoryId($this->model,'A');
        if($input != null){
            $rand_cate = array_rand($input, 1);
            $cate_id = $input[$rand_cate];
            $criteria = new CDbCriteria;
            $criteria->condition='category_id='.$cate_id.' and table_id != '.$this->model->id.' and table_name = "A"';
            $criteria->limit=3;
            $model_cate = CategoryRelation::model()->findAll($criteria);
        
            if($model_cate != null){
                $this->render('articles_viewrelation',array('model_cate'=>$model_cate));
            }
        }
    }
}
?>