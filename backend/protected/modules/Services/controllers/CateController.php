<?php
class CateController extends Controller{
    public function actionIndex(){
        header('Access-Control-Allow-Origin: *');
        header('Content-type: application/json');
        $data = array(
            'id'=>'',
            'parent_id'=>'',
            'order_possition'=>'',
            'title'=>'',
        );
        $dataAll = array();
        $model = Categories::model()->findAll();
        if($model != null){
            foreach($model as $key=>$cate){
                $data['id'] = $cate->id;
                $data['parent_id'] = $cate->parent_id;
                $data['title'] = $cate->title;
                $data['order_possition'] = $cate->order_possition;
                $dataAll[$key] = $data;
            }
        }
        if (isset($_GET['callback'])) {
          $d = array(
            'count'=>count($dataAll),
            'data'=>$dataAll
          );
          echo $_GET['callback'] . '(' . json_encode($d) . ');';
        }
        
    }
}
?>