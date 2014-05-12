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
				'actions'=>array('index','view','create','update','admin','delete'),
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
		$model=new Articles;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Articles']))
		{
			$model->attributes=$_POST['Articles'];
            $model->description = convertImage($_POST['Articles']['description'], Yii::app()->getBaseUrl(true),NEWS_CONTENT,'');
			$model->url = toSlug(stripVietnamese($model->title));
            $model->hot = $_POST['Articles']['hot'];
            
			$model->create_date=new CDbExpression('NOW()');
			$model->update_date =new CDbExpression('NOW()');
            $model->endhot_date = $_POST['Articles']['endhot_date'];
			$model->user_id = Yii::app()->user->id;
			$model->image=CUploadedFile::getInstance($model,'image');
			 if($model->validate()){
                if($model->image != null){
                    $image = time()."-".$model->image;
                    $model->image->saveAs(Yii::app()->basePath .'/../'.TEMP_IMAGE . $image);
                    $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_IMAGE . $image);
                    checkdirectory(RAPE_DATE);
                    $image_thumbai->resize(100,100,Image::NONE);  
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.RAPE_DATE.'thumbai_100/'. $image);              
                    $image_thumbai->resize(400,300,Image::AUTO);
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.RAPE_DATE.'thumbai_300/'. $image);
                    $path = RAPE_DATE;
                    $model->path = $path;
                    $model->image = $image;
                }
            }
			if($model->save()){

				if (isset($_POST['cate'])) {
					Categories::model()->saveCategory($_POST['cate'],$model->id,'A');
				}
				if (isset( $_POST['tags'])) {
					$tags = explode(",", $_POST['tags']);
					Tags::model()->saveTags($tags,$model);
				}
                if($model->image != ''){
                    $temp_image = Yii::app()->basePath .'/../'.TEMP_IMAGE.$model->image;
                    if (file_exists($temp_image)){
                        unlink($temp_image);
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Articles']))
		{
			$image_temp = $model->image;
			$model->attributes=$_POST['Articles'];
            $model->description = convertImage($_POST['Articles']['description'], Yii::app()->getBaseUrl(true),NEWS_CONTENT,'');
            $model->hot = $_POST['Articles']['hot'];
			$model->url = toSlug(stripVietnamese($model->title));
			$model->update_date =new CDbExpression('NOW()');
            $model->endhot_date = $_POST['Articles']['endhot_date'];
			$model->image=CUploadedFile::getInstance($model,'image');
			 if($model->validate()){
                if($model->image != null){
                    checkdirectory(RAPE_DATE);
                    $image = time()."-".$model->image;
                    $model->image->saveAs(Yii::app()->basePath .'/../'.TEMP_IMAGE . $image);
                    $image_thumbai = Yii::app()->image->load(Yii::app()->basePath .'/../'.TEMP_IMAGE . $image);
                    $image_thumbai->resize(100,100,Image::NONE);  
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.RAPE_DATE.'thumbai_100/'. $image);              
                    $image_thumbai->resize(600,600,Image::AUTO);  
                    $image_thumbai->save(Yii::getPathOfAlias('webroot').'/'.RAPE_DATE.'thumbai_300/'. $image); 
                    $path = RAPE_DATE;
                    $model->path = $path;
                    $model->image = $image;
                }else{
                    $model->image = $image_temp;
                }
            }
			if($model->save()){
				if (isset($_POST['cate'])) {
					CategoryRelation::model()->deleteAll("table_id = $model->id and table_name='A'");
					Categories::model()->saveCategory($_POST['cate'],$model->id,'A');
				}
				TagConnect::model()->deleteAll("table_id = $model->id and table_name='A'");
				if (isset( $_POST['tags'])) {
					$tags = explode(",", $_POST['tags']);
					Tags::model()->saveTags($tags,$model);
				}
                if($model->image != ''){
                    $temp_image = Yii::app()->basePath .'/../'.TEMP_IMAGE.$model->image;
                    if (file_exists($temp_image)){
                        unlink($temp_image);
                    }
                }
                
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
        $model = $this->loadModel($id);
        $filename1 = Yii::app()->basePath .'/../'.TEMP_IMAGE.$model->image;
        $filename2 = Yii::app()->basePath .'/../'.$model->path.'thumbai_100/'.$model->image;
         $filename3 = Yii::app()->basePath .'/../'.$model->path.'thumbai_300/'.$model->image;
        if($model->image != null){
            if (file_exists($filename1)){
                unlink($filename1);
            }
            if (file_exists($filename2)){
                unlink($filename2);
            }
            if (file_exists($filename3)){
                unlink($filename3);
            }
        }
		$this->loadModel($id)->delete();
        $criteria_tagca = new CDbCriteria;
        $criteria_tagca->condition='table_id='.$id.' AND table_name="A"';
        TagConnect::model()->deleteAll($criteria_tagca);
        CategoryRelation::model()->deleteAll($criteria_tagca);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Articles');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		//echo "abc";
		$model=new Articles('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Articles']))
			$model->attributes=$_GET['Articles'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Articles the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Articles::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Articles $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='articles-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
