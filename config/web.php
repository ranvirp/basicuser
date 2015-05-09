<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    //'homeUrl'=>'site',
    'language'=>'en',
    'components' => [
    'authManager' => [
		  'class' => '\yii\rbac\DbManager',
		  'ruleTable' => 'authrule', // Optional
		  'itemTable' => 'authitem',  // Optional
		  'itemChildTable' => 'authitemchild',  // Optional
		  'assignmentTable' => 'authassignment',  // Optional
		  ],
    'urlManager' => [
			'enablePrettyUrl' => true,
			'rules' => [
				['class' => 'yii\rest\UrlRule', 'controller' => 'api/photo'],
			],
			],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'test',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\users\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'modules'=>['users'=>['class'=>'app\modules\users\Module'],
    'reply'=>['class'=>'app\modules\reply\Module'],
    'work'=>['class'=>'app\modules\work\Module'],
    'gridview'=>['class'=>'kartik\grid\Module']
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
    $config['modules']['gii'] = ['class' => 'yii\gii\Module',
            'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '192.168.178.20'],
            'generators' => [ //here
                'crud' => [ // generator name
                    'class' => 'yii\gii\generators\crud\Generator', // generator class
                    'templates' => [ //setting for out templates
                        'myCrud' => '@app/giitemplatesNew/crud/default', // template name => path to template
                    ]
                ],
                'model' => [ // generator name
                    'class' => '\app\giiTemplatesNew\model\Generator', // generator class
                    'templates' => [ //setting for out templates
                        'myModel' => '@app/giitemplatesNew/model/default', // template name => path to template
                    ]
                ],
                
            ],
            ];
}

return $config;
