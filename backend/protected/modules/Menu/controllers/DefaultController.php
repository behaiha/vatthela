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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(''),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('createmenu','createlist','index','view','create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(''),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionCreateMenu()
	{
		if (isset($_POST['data']) && isset($_POST['id'])) {
			$mid = $_POST['id'];
			$model = $this->loadModel($mid);
			MenuRelation::model()->deleteAll("menu_id=$mid");
			$data = json_decode($_POST['data'],true);
			$idx = 0;
			foreach ($data as $k => $key ) {
				$type = $key['type'];
				$text = $key['text'];
				$value = $key['value'];
				$parent = $key['parent'];
				$pid = $key['id'];
				$key["parent_id"] = 0;
				$data[$k] = $key;
				$test = 0;
				if ($type == "L") {
					$val = Link::model()->findByPk($pid);
					if ($val == null) {
						$val = new Link;
					}
					$val->text = $text;
					$val->href = $value;
					$val->status = 0;
					$val->save();
				}elseif ($type == "C") {
					$val = Categories::model()->findByPk($value);
				}
				if ($val != null) {
					$check = MenuRelation::model()->findAllByAttributes(array('menu_id'=>$mid,'table_id'=>$val->id), "table_name = 'C' or table_name ='L'");
					if ($check == null) {
						$valueMenu = new MenuRelation;
						$valueMenu->menu_id = $mid;
						$valueMenu->table_id = $val->id;
						$valueMenu->table_name = $type;
						$valueMenu->possition = $idx;
						$valueMenu->text = $text;
					if ($parent == 0) {
						$valueMenu->parent_id = $parent;
					}else{
						$valueMenu->parent_id = $data[$parent-1]['parent_id'];
					}
					if ($valueMenu->save(false)) {
						$idx++;
						$key["parent_id"] = $valueMenu->id;
						$data[$k] = $key;
					}
					}
				}
			}
		}
	}
	public function actionCreateList($id)
	{
		$model = $this->loadModel($id);
		$criteria=new CDbCriteria;
		$criteria->condition ="id not in (select table_id from menu_relation where menu_id = $id and table_name='C')";
		$categories = Categories::model()->findAll($criteria);
		$this->render('createlist',array(
			'model'=>$model,
			'categories'=>$categories
		));
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
		$model=new Menu;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Menu');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Menu('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Menu']))
			$model->attributes=$_GET['Menu'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Menu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Menu::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Menu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='menu-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
