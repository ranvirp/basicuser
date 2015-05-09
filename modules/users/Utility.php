<?php

namespace app\modules\users;

use Yii;
use \yii\helpers\ArrayHelper;


class Utility 
{
  public static function getLevelsByType($id)
  {
	  $lang=Yii::$app->language;
	  $dt=  \app\modules\users\models\DesignationType::findOne($id);
	  $classname= $dt->level->class_name;
	  return ArrayHelper::map($classname::find()->asArray()->all(),'id','name_'.$lang);
	  
  
}
}
?>