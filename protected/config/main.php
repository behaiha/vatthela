<?php

$t = array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>APP_NAME,
    'theme'=>'classic',
	// preloading 'log' component
	'preload'=>array('log'),
    'defaultController' => 'Articles/default/index',
	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
        'Home',
        'Articles',
        'Users',
        'Videos', 
		// uncomment the following to enable the Gii tool
		
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl'=>array("/Users/default/login"),
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' =>false,
			'rules'=>array(
				// Core
				'<controller:\w+>/<action:\w+>/page/<page:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                 //Home
                'trang-chu'=>array('/Articles/default/index'),
                'bai-viet/<id:\d+>/<title:[\w-_\.]+>'=>array('/Articles/default/view','urlSuffix'=>'.html'),
                'the-loai/<id:\d+>/<title:[\w-_\.]+>'=>array('/Articles/category/viewArticleOfCate','urlSuffix'=>'.html'),
                'tim-kiem'=>array('/Articles/search/search'),
                'bai-viet-moi-nhat'=>array('/Articles/default/articlesnew','urlSuffix'=>'.html'),
                'bai-viet-xem-nhieu'=>array('/Articles/default/viewmost','urlSuffix'=>'.html'),
                
                'videos/<id:\d+>/<title:[\w-_\.]+>'=>array('/Videos/default/view','urlSuffix'=>'.html'),
                'videos'=>array('/Videos/default/index','urlSuffix'=>'.html'),
                'videos-xem-nhieu'=>array('/Videos/default/viewmost','urlSuffix'=>'.html'),
                
                
			),
		),
	
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname='.DB_NAME,
			'emulatePrepare' => true,
			'username' => DB_USER,
			'password' => DB_PASSWORD,
			'charset' => DB_CHARSET,
		),
        'image'=>array(
			'class'=>'application.extensions.image.CImageComponent',
			// GD or ImageMagick
			'driver'=>'GD',
			// ImageMagick setup path
			'params'=>array('directory'=>'/opt/local/bin'),
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
$gii = array();
if (YII_GII_CONFIG == 'on') {
	$t['modules']['gii'] = array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		);
	// array_push($t['modules'], $gii);
}
return $t;