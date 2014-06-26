<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
    public $layout='//layouts/home';
    public $pageTitleInfo;
	public $keywords;
	public $robotsIndex;

	public $face_title;
    public $face_des;
    public $face_image;
    public $face_url;
    public $face_status = 1;
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public function setPageSeo($title,$desc,$keywords ='',$robots = '')
	{
		$this->pageTitleInfo = $title;
		$this->keywords = $keywords;
		$this->robotsIndex = $robots;
		Yii::app()->clientScript->registerMetaTag($desc, 'Description');
	}
	public function setOpenGraph($title,$des,$image,$url){
		$this->face_status = 1;
        $this->face_title = $title;
        $this->face_des = $des;
        $this->face_image = $image;
        $this->face_url = $url;
    }
}