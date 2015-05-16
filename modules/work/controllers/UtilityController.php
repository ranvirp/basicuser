<?php
namespace app\modules\work\controllers;
use app\modules\work\Controller;
use Yii;
class UtilityController extends \yii\web\Controller
{
public function actionGetdivision($c)//division id
{
  
  return json_encode(\yii\helpers\ArrayHelper::map(\app\modules\work\models\Division::find()->where(['circle_id'=>$c])->asArray()->all(),'id','name_'.Yii::$app->language));
}
}