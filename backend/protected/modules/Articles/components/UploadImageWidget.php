<?php

class UploadImageWidget extends CWidget
{
    public $model;
    public $image;
    public $name ;
    public $form;
    public function init()
    {
        $this->render('uploadimage',array('model'=>$this->model,'form'=>$this->form));
    }
}

?>