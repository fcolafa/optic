<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Optilens',
	'language'=>'es',
	'sourceLanguage'=>'en',
	'charset'=>'utf-8',
        'theme'=>'optic',
       
        

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'1234',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
				'generatorPaths'=>array(
					'application.modules.gii',   // a path alias
				),
		),
		
	),

	// application components
	'components'=>array(
            
                //component from new theme
            
        'ePdf' => array(
        		'class'         => 'ext.yii-pdf.EYiiPdf',
        		'params'        => array(
       			     'mpdf'     => array(
                		'librarySourcePath' => 'application.vendors.mpdf.*',
                		'constants'         => array(
                		    '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                		),
                		'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
                		'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                		    'mode'              => '', //  This parameter specifies the mode of the new document.
                		    'format'            => 'A4', // format A4, A5, ...
                		    'default_font_size' => 0, // Sets the default document font size in points (pt)
                		    'default_font'      => '', // Sets the default font-family for the new document.
                		    'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                		    'mgr'               => 15, // margin_right
                		    'mgt'               => 16, // margin_top
                		    'mgb'               => 16, // margin_bottom
                		    'mgh'               => 9, // margin_header
                		    'mgf'               => 9, // margin_footer
                		    'orientation'       => 'P', // landscape or portrait orientation
                		)
	        	    ),	
        		    'HTML2PDF' => array(
        		        'librarySourcePath' => 'application.vendor.html2pdf.*',
        		        'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
        		        'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
        		            'orientation' => 'P', // landscape or portrait orientation
        		            'format'      => 'A4', // format A4, A5, ...
        		            'language'    => 'en', // language: fr, en, it ...
        		            'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
        		            'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
        		            'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
        		        )
        		    )
        		),
		    ),
                'widgetFactory'=>array(
                    'class'=>'CWidgetFactory',
        
                    
            'widgets'=>array(
                'CGridView'=>array(
                    'htmlOptions'=>array('cellspacing'=>'0','cellpadding'=>'0'),
					'itemsCssClass'=>'item-class',
					'pagerCssClass'=>'pager-class'
                ),
                'CJuiTabs'=>array(
                    'htmlOptions'=>array('class'=>'shadowtabs'),
                ),
                'CJuiAccordion'=>array(
                    'htmlOptions'=>array('class'=>'shadowaccordion'),
                ),
                'CJuiProgressBar'=>array(
                   'htmlOptions'=>array('class'=>'shadowprogressbar'),
                ),
                'CJuiSlider'=>array(
                    'htmlOptions'=>array('class'=>'shadowslider'),
                ),
                'CJuiSliderInput'=>array(
                    'htmlOptions'=>array('class'=>'shadowslider'),
                ),
                'CJuiButton'=>array(
                    'htmlOptions'=>array('class'=>'shadowbutton'),
                ),
                'CJuiButton'=>array(
                    'htmlOptions'=>array('class'=>'shadowbutton'),
                ),
                'CJuiButton'=>array(
                    'htmlOptions'=>array('class'=>'button green'),
                ),
     
               
            ),
        ),
            
   
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>false,
                        //'authTimeout'=>300,
		),
		// uncomment the following to enable URLs in path-format
	
		'urlManager'=>array(
			'urlFormat'=>'path',
                        'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
                'authManager'=> array(
                    'class'=>'CDbAuthManager',
                    'connectionID'=>'db',
                ),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=optic',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
                        'enableProfiling'=>true,
		),
		'coreMessages'=>array(
			'basePath'=>'protected/messages',
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
				
				array(
					'class'=>'CWebLogRoute',
				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
        /**
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'btnclass'=>'button grey',
            ),
    **/
    'params'=>require(dirname(__FILE__).'/params.php'),
);