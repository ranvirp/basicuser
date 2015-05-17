<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');
require_once __DIR__ . implode(DIRECTORY_SEPARATOR, ['', '..', 'vendor', 'autoload.php']);
require_once __DIR__ . implode(DIRECTORY_SEPARATOR, ['', '..', 'vendor', 'yiisoft', 'yii2', 'Yii.php']);

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'gii'],
    'controllerNamespace' => 'app\commands',
    'modules' => [
        'gii' => 'yii\gii\Module',
         'users'=>['class'=>'app\modules\users\Module'],
    'reply'=>['class'=>'app\modules\reply\Module'],
    'work'=>['class'=>'app\modules\work\Module'],
    
    ],
    'components' => [
    'authManager' => [
		  'class' => '\yii\rbac\DbManager',
		  //'ruleTable' => 'authrule', // Optional
		  //'itemTable' => 'authitem',  // Optional
		  //'itemChildTable' => 'authitemchild',  // Optional
		  //'assignmentTable' => 'authassignment',  // Optional
		  ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    
    'params' => $params,
];
