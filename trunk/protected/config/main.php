<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Gumkáčik',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
        'application.extensions.libs.*',

    ),

    'modules' => array(
        // uncomment the following to enable the Gii tool
        /*
          'gii'=>array(
              'class'=>'system.gii.GiiModule',
              'password'=>'Enter Your Password Here',
               // If removed, Gii defaults to localhost only. Edit carefully to taste.
              'ipFilters'=>array('127.0.0.1','::1'),
          ),
          */
    ),

    // application components
    'components' => array(

        'clientScript' => array(
            'packages' => array(
                'tiny_mce' => array(
                    'basePath' => 'application.assets.tiny_mce',
                    'depends' => array('jquery'),
                    'js' => array(
                        'jquery.tinymce.js',
                        'tiny_mce.js',
                      //  'jquery.mousewheel-3.0.4.pack.js',
                    ),
                    'css' => array(
                      //  'jquery.fancybox-1.3.4.css'
                    )
                ),
            ),
        ),

        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),

        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'caseSensitive' => false,
            'showScriptName' => false,
            'rules' => array(

            ),
        ),


        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=tis',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),

        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'db.log',
                    'levels' => 'db_log',
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
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),

);