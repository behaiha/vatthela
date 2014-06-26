<?php

// change the following paths if necessary
$_config = dirname(__FILE__).'/tat-config.php';
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$globals=dirname(__FILE__).'/protected/config/globals.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
define('SLIDE_SHOW','/images/slideshow/');
define('FIGURE_NAME', 'cate');
define('LOGO','/images/logo/');
define('CATEGOGIES_IMAGE','/images/category/');


require_once($_config);
require_once($yii);
require_once($globals);
Yii::createWebApplication($config)->run();
