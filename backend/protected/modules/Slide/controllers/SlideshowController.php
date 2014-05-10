<?php

class SlideshowController extends Controller
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
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','saveimages'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    public function actionSaveimages(){
        if(isset($_POST['data'])){
            $data = json_decode($_POST['data'], true);
            if(isset($_POST['category_id'])){
                $category_id = $_POST['category_id'];
            }
            foreach($data as $key=>$row){
                if($data[$key]['type'] != 0){
                    $model = new Slideshow;
                    $model->image = $data[$key]['image'];
                    $model->category_id = $category_id;
                    $typefile = getTypeFile($data[$key]['image']);
                    $model->alt = str_replace($typefile,'',$data[$key]['image']);
                    if($model->save(false)){
                        $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_IMAGE.$data[$key]['image']);
                        $image_thumbai->resize(567,350,Image::NONE);
                        $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.SLIDE_SHOW.$data[$key]['image']);
                    }
                }else{
                    $file_del=Yii::app()->basePath .'/../'.TEMP_IMAGE.$data[$key]['image'];
                    if (file_exists($file_del)) {
                        unlink($file_del);
                    }
                }
            }
            if($data != null){
                $url = Yii::app()->createUrl('/Slide/slideshow/admin');
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
	public function actionCreate()
	{
		$model=new Slideshow;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Slideshow']))
		{
			$model->attributes=$_POST['Slideshow'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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
		if(isset($_POST['Slideshow']))
		{
			$model->attributes=$_POST['Slideshow'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            $model->alt = $_POST['Slideshow']['alt'];
            if($model->validate()){
                if($model->image != ''){
                    $image =  time()."-".$model->image;
                    $model->image->saveAs(Yii::app()->basePath .'/../'.TEMP_IMAGE . $image);
                    $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_IMAGE.$image);
                     $image_thumbai->resize(567,350,Image::NONE);
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.SLIDE_SHOW.$image);
                    $model->image=$image;
                }else{
                    $model->image = $image_temp;
                }
            }
			if($model->save())
				$this->redirect(array('admin'));
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
        $filename1 = Yii::app()->basePath .'/../'.TEMP_IMAGE.$model->image;
        $filename2 = Yii::app()->basePath .'/../'.SLIDE_SHOW.$model->image;
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Slideshow');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Slideshow('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Slideshow']))
			$model->attributes=$_GET['Slideshow'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Slideshow the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Slideshow::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Slideshow $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='slideshow-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
