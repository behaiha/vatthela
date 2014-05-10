<?php

class NewsController extends Controller
{
    public $limit = 10;
    
    public function actionView(){
        header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
        $data = array(
            'key'=>0,
            'value'=>'',
            'news_title'=>'',
            'news_shortdes'=>'',
            'news_des'=>'',
            'news_createdate'=>'',
        );
        if(isset($_GET['news_id'])){
            $id = $_GET['news_id'];
            $model = Articles::model()->findByPk($id);
            if($model != null){
                $data['key'] = 1;
                $data['value'] = 'Thành công';
                $data['news_title'] = $model->title;
                $data['news_shortdes'] = $model->short_description;
                $data['news_des'] = $model->description;
                $data['news_createdate'] = $model->create_date;
            }
            if (isset($_GET['callback'])) {
                echo $_GET['callback'] . '(' . json_encode($data) . ');';
            }
        }
    }
    
	public function actionIndex()
	{
		header('Access-Control-Allow-Origin: *');
		header('Content-type: application/json');
        $data = array(
            'key'=>0,
            'value'=>'',
            'news_id'=>'',
            'news_image'=>'',
            'news_alt'=>'',
            'news_title'=>'',
            'news_shortdes'=>'',
            'news_createdate'=>'',
        );
        $dataAll = array();
        if(isset($_GET['Xemthem'])){/**if isset offset**/
            $offset = $_GET['Xemthem'];
            $criteria = new CDbCriteria;
            $criteria->order='id DESC';    
            $criteria->limit = $this->limit;
            $criteria->offset = $offset * $this->limit;
            
            $model = Articles::model()->findAll($criteria); 
            //var_dump($model);
            if($model != null){
                
                foreach($model as $key=>$news){
                    $data['key'] = 1;
                    $data['value'] = 'Thành công';
                    $data['news_id'] = $news->id;
                    $data['news_image'] = Yii::app()->getBaseUrl(true).'/'.$news->path.'thumbai_100/'.$news->image;
                    $data['news_alt'] = $news->url;
                    $data['news_title'] = $news->title;
                    $data['news_shortdes'] = $news->short_description;
                    $data['news_createdate'] = $news->create_date;
                    $dataAll[$key] = $data;
                }
            }else{
                $data['key'] = 2;
                $data['value'] = "Không còn dữ liệu";
            }
            
        }//end if isset offset
        
        if (isset($_GET['callback'])) {

          $d = array(
    
            'count'=>count($dataAll),
    
            'data'=>$dataAll
    
          );
    
          echo $_GET['callback'] . '(' . json_encode($d) . ');';
    
        }
	}
}