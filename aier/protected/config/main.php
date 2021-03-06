<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'OsStroe 后台刷机工具',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*', 
		'application.components.*',
	),

	'defaultController'=>'jobs',
	'modules'=>array(
			'gii'=>array(
					'class'=>'system.gii.GiiModule',
					'password'=>'790128083',
					// 'ipFilters'=>array(...a list of IPs...),
					// 'newFileMode'=>0666,
					// 'newDirMode'=>0777,
			),
	),
	// application components
	'components'=>array(
		'clientScript' => array(
            'scriptMap' => array(
                'jquery.js'=>false,
                'jquery.min.js'=>false,
            ),
        ),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=blog',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				  '<controller:\w+>/<id:\d+>'=>'<controller>/view',  
				    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',  
				    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', 
			),
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
	'params'=>require(dirname(__FILE__).'/params.php'),
);
