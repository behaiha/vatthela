<?php
class Head extends CWidget{
	public $pageTitleInfo;
	public $keywords;
	public $robotsIndex;
	public $face_title;
    public $face_des;
    public $face_image;
    public $face_url;
    public $face_status = 1; 
    public function init(){
        $this->render('head');
    }
}
?>