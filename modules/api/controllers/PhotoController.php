<?php

namespace app\modules\api\controllers;

use yii\rest\ActiveController;
//use yii\filters\auth\CompositeAuth;
//use yii\filters\auth\HttpBasicAuth;
//use yii\filters\auth\HttpBearerAuth;
//use yii\filters\auth\QueryParamAuth;
use Yii;

class PhotoController  extends ActiveController
{
    public $modelClass = 'app\modules\gpsphoto\models\Photo';
	/*
	public function behaviors()
{
    $behaviors = parent::behaviors();
    $behaviors['authenticator'] = [
        'class' => 
            QueryParamAuth::className(),
        
    ];
    return $behaviors;
}
*/
	public function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			$access_token=Yii::$app->request->get('access_token');
			//$userClass=Yii::$app->components['user']['identityClass'];
			$userClass='\app\modules\users\models\User';
			$user=$userClass::findIdentityByAccessToken($access_token);
			if ($user)
				return true;
			else 
				return false;
				
			
		}
		else
			return false;
	}
	 /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'create' => [
                'class' => 'app\modules\api\PhotoCreateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
            'update' => [
                'class' => 'yii\rest\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'delete' => [
                'class' => 'yii\rest\DeleteAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }

}

