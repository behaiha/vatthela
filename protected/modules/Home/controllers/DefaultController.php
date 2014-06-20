<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
    public function actionTestJson(){
        if(isset($_POST['name']) and isset($_POST['country']) and isset($_POST['twitter'])){
            $model = new Articles;
            $model->title = $_POST['name'];
            $model->url = $_POST['country'];
            $model->save();
        }
        
        
       
    }
}