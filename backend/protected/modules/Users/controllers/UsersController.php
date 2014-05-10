<?php

class UsersController extends Controller
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
		//$check = Users::model()->isUsers(Yii::app()->user->id);
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('create'),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','success','update','changepass'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create'),
                //'users'=>array('admin'),
                'roles'=>array('admin'),
				//'expression'=>"$check == 1",
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
		$model=new Users;
		$model->scenario = 'register';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->roles = "member";
            $model->createDate = date('Y-m-d H:i:s');
			$model->createBy= 0;
			$model->isBlock = 0;
			// $model->confirmPassword = CPasswordHelper::hashPassword($model->confirmPassword);
			if($model->save()){
				$model->password = CPasswordHelper::hashPassword($model->password);
				$model->save(false);
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	public function actionSuccess()
	{
		$this->render('success');
	}
	public function actionChangePass()
	{
		$model = Users::model()->findByPk(Yii::app()->user->id);
		$model->scenario = 'changePassword';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if ($model->validate()){
				$pass = $_POST['Users']['currentPassword'];
				if (CPasswordHelper::verifyPassword($pass, $model->password)) {
					// echo "string";
					$model->password = CPasswordHelper::hashPassword($model->newPassword);
					if ($model->save()) {
						$this->redirect(array('success'));
					}
				}
			}
		}

		$this->render('changePassword',array('model'=>$model));
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 public function actionUpdate($id)
	 {
	  $model=$this->loadModel($id);
	   $avatar_temp = $model->avatar;
	  // Uncomment the following line if AJAX validation is needed
	  // $this->performAjaxValidation($model);

	  if(isset($_POST['Users']))
	  {
	   		$model->attributes=$_POST['Users'];
            $model->avatar = CUploadedFile::getInstance($model, 'avatar');
            if($model->validate()){
                if($model->avatar != null){
                    // checkdirectory(AVATAR);
                    $avatar = time()."-".$model->avatar;
                    $model->avatar->saveAs(Yii::app()->basePath .'/../'.AVATAR . $avatar);
                    $model->avatar = $avatar;
                    //GameFile::model()->updateByPk($id,array('path'=>$path));
                }else{
                    $model->avatar = $avatar_temp;
                }
            }
	   		if($model->save()){
	       		 $this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
