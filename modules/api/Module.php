<?php

namespace app\modules\api;
use Yii;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\api\controllers';

    public function init()
    {
         parent::init();
    Yii::$app->user->enableSession = false;
	Yii::$app->request->enableCsrfValidation = false;
	\Yii::$app->getI18n()->translations['auth.*'] = [
			'class' => 'yii\i18n\PhpMessageSource',
			'basePath' => __DIR__.'/messages',
		];
        // custom initialization code goes here
    }
}
