<?php

class DefaultController extends Controller
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
		$check = Users::model()->isUsers(Yii::app()->user->id);
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view','change'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
                'roles'=>array('admin'),
				//'expression'=>"$check == 1",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionChange()
	{
		if (isset($_POST['parent'])) {
			$parent = $_POST['parent'];
			$criteria=new CDbCriteria;
			$criteria->condition = "parent_id=$parent";
			$model = new CActiveDataProvider('Categories', array(
					'criteria'=>$criteria,
					));
			$this->renderPartial('change',array('model'=>$model,'parent'=>$parent),false,true);
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
	public function actionCreate($check)
	{
		$model=new Categories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categories']))
		{
			$model->attributes=$_POST['Categories'];
			$model->user_id = Yii::app()->user->id;
			$model->active = 0;
			$model->url = toSlug(stripVietnamese($model->title));
			$model->create_date=date("Y-m-d H:i:s");
			$model->user_id = Yii::app()->user->id;
			$model->image=CUploadedFile::getInstance($model,'image');
			 if($model->validate()){
                if($model->image != null){
                    $imgs = explode(".", $model->image);
                	$duoi = $imgs[count($imgs)-1];
                    $image = time()."-".toSlug(stripVietnamese($imgs[0])).'.'.$duoi;
                    $model->image->saveAs(Yii::app()->basePath .'/../'.CATEGOGIES_IMAGE . $image);
                    $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.CATEGOGIES_IMAGE . $image);
                    $model->image = $image;
                }
            }
			if($model->save()){
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'check'=>$check,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categories']))
		{
			$image_temp = $model->image;
			$model->attributes=$_POST['Categories'];
			$model->active = 0;
			$model->url = toSlug(stripVietnamese($model->title));
			$model->image=CUploadedFile::getInstance($model,'image');
			if($model->validate()){
                if($model->image != null){
                    $imgs = explode(".", $model->image);
                	$duoi = $imgs[count($imgs)-1];
                    $image = time()."-".toSlug(stripVietnamese($imgs[0])).'.'.$duoi;
                    $model->image->saveAs(Yii::app()->basePath .'/../'.CATEGOGIES_IMAGE . $image);
                    $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.CATEGOGIES_IMAGE . $image);
                    $model->image = $image;
                    $temp_image = Yii::app()->basePath .'/../'.CATEGOGIES_IMAGE.$image_temp;
	                if (file_exists($temp_image) && $image_temp != ''){
	                    unlink($temp_image);
	                }
                }else{
                    $model->image = $image_temp;
                }
            }
			if($model->save()){
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
		$this->layout='//layouts/column1';
		$criteria=new CDbCriteria;
		$criteria->condition = "parent_id=0";
		$criteria->order = "id desc";
		$model = new CActiveDataProvider('Categories', array(
				'criteria'=>$criteria,
				));
		if(isset($_GET['Categories']))
			$model->attributes=$_GET['Categories'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout='//layouts/column1';
		$criteria=new CDbCriteria;
		$criteria->order = "id DESC";
		$criteria->condition = "parent_id=0";
		$model = new CActiveDataProvider('Categories', array(
				'criteria'=>$criteria,
				));
		if(isset($_GET['Categories']))
			$model->attributes=$_GET['Categories'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Categories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
