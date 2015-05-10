<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionGentoken()
	{
		
		$username=\Yii::$app->request->post('username');
		$password=\Yii::$app->request->post('password');
		//$userClass=\Yii::$app->components['user']['identityClass'];
		$userClass='\app\modules\users\models\User';
			
		
		
		$user= $userClass::find()->where(['username'=>$username])->one();
		
		
		if ($user->validatePassword($password))
		{
		    $user->auth_key=Yii::$app->security->generateRandomString();
			$user->save();
			//$user->generateAccessToken();
			return $user->auth_key;
		}
		else 
			return '';
	}
}
