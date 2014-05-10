<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLogin()
	{
		if (!Yii::app()->user->isGuest) {
			$this->redirect(array('/Users/users/view','id'=>Yii::app()->user->id));
		}
		$model = new Users('login');	
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){	
				$this->redirect(Yii::app()->user->returnUrl);
			}else{
				$model->addError('password','Incorrect username or password.');
			}
		}
		$this->render('login',array('model'=>$model));
	}
	
}