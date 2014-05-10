<?php

class CreateslideController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','upload','saveimages'),
				'roles'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function actionUpload()
    {
            Yii::import("ext.EAjaxUpload.qqFileUploader");
	        $folder=Yii::app() -> getBasePath(). "/../". TEMP_IMAGE;// folder for uploaded files
	        $allowedExtensions = array("jpg","jpeg","gif","png");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	        echo $return;
    }
    public function actionSaveimages($id){
        if(isset($_POST['data'])){
            $data = json_decode($_POST['data'], true);
            foreach($data as $key=>$row){
                if($data[$key]['type'] != 0){
                    $model = new ArticleImage;
                    $model->image = $data[$key]['image'];
                    $model->article_id = $id;
                    $typefile = getTypeFile($data[$key]['image']);
                    $model->alt = str_replace($typefile,'',$data[$key]['image']);
                    if($model->save(false)){
                        checkdirectory(RAPE_DATE);
                        $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_IMAGE.$data[$key]['image']);
                        $image_thumbai->resize(538,340,Image::NONE);
                        $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.RAPE_DATE.'slide_640_350/'.$data[$key]['image']);
                        ArticleImage::model()->updateByPk($model->id,array('path'=>RAPE_DATE.'slide_640_350/'));
                    }
                }else{
                    $file_del=Yii::app()->basePath .'/../'.TEMP_IMAGE.$data[$key]['image'];
                    if (file_exists($file_del)) {
                        unlink($file_del);
                    }
                }
            }
            if($data != null){
                $url = Yii::app()->createUrl('/Articles/createslide/admin',array('id'=>$model->article_id));
                echo "<script>window.location.href = '".$url."';</script>";
            }
        }
    }
    
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
	   $model_article = Articles::model()->findByPk($id);
        if($model_article===null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
    		$model=new ArticleImage;
    		if(isset($_POST['ArticleImage']))
    		{
    			$model->attributes=$_POST['ArticleImage'];
    			if($model->save())
    				$this->redirect(array('view','id'=>$model->id));
    		}
    		$this->render('create',array(
    			'model'=>$model,
                'model_article'=>$model_article,
    		));
      }
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $image_temp = $model->image;
		if(isset($_POST['ArticleImage']))
		{
			$model->attributes=$_POST['ArticleImage'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            $model->alt = $_POST['ArticleImage']['alt'];
            if($model->validate()){
                if($model->image != ''){
                    $image =  time()."-".$model->image;
                    $model->image->saveAs(Yii::app()->basePath .'/../'.TEMP_IMAGE . $image);
                    checkdirectory(RAPE_DATE);
                    $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_IMAGE.$image);
                    $image_thumbai->resize(640,350,Image::NONE);
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.RAPE_DATE.'slide_640_350/'.$image);
                    $path = RAPE_DATE.'slide_640_350/';
                    $model->path = $path;
                    $model->image=$image;
                }else{
                    $model->image = $image_temp;
                }
            }
			if($model->save())
				$this->redirect(array('admin','id'=>$model->article_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        $model = $this->loadModel($id);
        $article_id = $model->article_id;
        $filename1 = Yii::app()->basePath .'/../'.TEMP_IMAGE.$model->image;
        $filename2 = Yii::app()->basePath .'/../'.$model->path.$model->image;
        if($model->image != null){
            if (file_exists($filename1)){
                unlink($filename1);
            }
            if (file_exists($filename2)){
                unlink($filename2);
            }
        }
		$this->loadModel($id)->delete();
        
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin','id'=>$article_id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($id)
	{
	   $model_article = Articles::model()->findByPk($id);
        if($model_article===null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
    		$dataProvider=new CActiveDataProvider('ArticleImage',array(
                'criteria'=>array(
                    'condition'=>'article_id='.'"'.$id.'"',
                    'order'=>'id DESC',
                    //'with'=>array('author'),
                ),
            
            ));
    		$this->render('index',array(
    			'dataProvider'=>$dataProvider,
                'model_article'=>$model_article,
    		));
        }
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($id)
	{
        $model_article = Articles::model()->findByPk($id);
        if($model_article===null){
            throw new CHttpException(404,'The requested page does not exist.');
        }else{
    		$model=new ArticleImage('search');
    		$model->unsetAttributes();  // clear any default values
    		if(isset($_GET['ArticleImage']))
    			$model->attributes=$_GET['ArticleImage'];
    
    		$this->render('admin',array(
    			'model'=>$model,
                'model_article'=>$model_article,
    		));
        }
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ArticleImage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ArticleImage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ArticleImage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='game-image-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
