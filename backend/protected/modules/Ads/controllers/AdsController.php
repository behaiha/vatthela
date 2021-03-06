<?php

class AdsController extends Controller
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
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','admin','delete','create','update','view'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
		$model=new Ads;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
            $model->title = $_POST['Ads']['title'];
            $model->alt = $_POST['Ads']['alt'];
            $model->html = $_POST['Ads']['html'];
            $model->height = $_POST['Ads']['height'];
            $model->width = $_POST['Ads']['width'];
            $model->mobile = $_POST['Ads']['mobile'];
			$model->url_link = $_POST['Ads']['url_link'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            if ($model->type ==  1) {
            	$model->scenario = 'image';
            }
            if ($model->type ==  2) {
            	$model->scenario = 'html';
            }
			if($model->save()){
                if ($model->type == 1) {
                	checkdirectory(TEMP_ADS);
                	checkdirectory(ADS_DATE,'check');
	                $image =  time()."-".$model->image;
	                $model->image->saveAs(Yii::app()->basePath .'/../'.TEMP_ADS . $image);
	                $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_ADS . $image);
                	$image_thumbai->resize($model->width,$model->height, Image::NONE);  
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.ADS_DATE. $image); 
                    $path = ADS_DATE;
                    $model->path = $path;
                    $model->image = $image;
                    $model->save(false);
                	if($model->image != ''){
	                    $temp_image = Yii::app()->basePath .'/../'.TEMP_ADS.$model->image;
	                    var_dump(file_exists($temp_image));
	                    if (file_exists($temp_image)){
	                        unlink($temp_image);
	                    }
	                }
                }
				$this->redirect(array('admin'));
            }
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
        $possition = $model->possition;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Ads']))
		{
			$model->attributes=$_POST['Ads'];
            $model->title = $_POST['Ads']['title'];
            $model->alt = $_POST['Ads']['alt'];
            $model->html = $_POST['Ads']['html'];
            $model->height = $_POST['Ads']['height'];
            $model->width = $_POST['Ads']['width'];
            $model->mobile = $_POST['Ads']['mobile'];
			$model->url_link = $_POST['Ads']['url_link'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            if ($model->type ==  1) {
            	$model->scenario = 'image';
            }
            if ($model->type ==  2) {
            	$model->scenario = 'html';
            }
			if($model->save()){
                if ($model->type == 1) {
                	checkdirectory(TEMP_ADS);
                	checkdirectory(ADS_DATE,'check');
	                $image =  time()."-".$model->image;
	                $model->image->saveAs(Yii::app()->basePath .'/../'.TEMP_ADS . $image);
	                $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_ADS . $image);
                	$image_thumbai->resize($model->width,$model->height, Image::NONE);  
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.ADS_DATE. $image); 
                    $path = ADS_DATE;
                    $model->path = $path;
                    $model->image = $image;
                    $model->save(false);
                	if($model->image != ''){
	                    $temp_image = Yii::app()->basePath .'/../'.TEMP_ADS.$model->image;
	                    var_dump(file_exists($temp_image));
	                    if (file_exists($temp_image)){
	                        unlink($temp_image);
	                    }
	                }
                }
				$this->redirect(array('admin'));
            }
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
		$dataProvider=new CActiveDataProvider('Ads');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Ads('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Ads']))
			$model->attributes=$_GET['Ads'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Ads the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Ads::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Ads $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ads-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
