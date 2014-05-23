<?php
class Header_Login extends CWidget{
    public function init(){
    	if (Yii::app()->user->isGuest) {
    		Yii::import('application.modules.Users.models.LoginForm');
	    	$model=new LoginForm;
	        $this->render('header_login_guest',array('model'=>$model));
    	}else{
    		$model = Users::model()->findByPk(Yii::app()->user->id);
    		if ($model != null) {
    			if ($model->image != null) {
    				$image = Yii::app()->baseUrl.$model->image->path.$model->image->image;
    			}else{
    				$image =Yii::app()->baseUrl.AVATAR_USER.'avatar.png';
    			}
    			$this->render('header_login_view_user',array('model'=>$model,'image'=>$image));
    		}
    	}
    }
}
?>