<?php
$_config = dirname(__FILE__).'/../tat-config.php';
// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$globals=dirname(__FILE__).'/protected/config/globals.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
define('ADS','images/ads/');
define('AVATAR','../images/users/avatar/');
define('SERVER','../images/server/');
define('TEMP_IMAGE','../images/temp_image/');
define('TEMP_ADS','../images/temp_image/ads/');
define('SLIDE_SHOW','../images/slideshow/');
define('NEWS_CONTENT', 'images/content/');

$_date = date("Y-m-d");
define('RAPE_DATE','../images/articles/'.$_date.'/');
define('ADS_DATE','../images/ads/'.$_date.'/');
require_once($_config);
require_once($yii);
require_once($globals);
Yii::createWebApplication($config)->run();
Yii::app()->setTimeZone('Asia/Ho_Chi_Minh');
