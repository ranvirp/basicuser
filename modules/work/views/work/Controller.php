<?php
namespace app\modules\users;
use Yii;
class Controller extends \yii\web\Controller
{
  public function beforeAction($action)
  {
    if (Yii::$app->user->can($this->id.$action->id))
      return parent::beforeAction($action);
    throw new \yii\web\MethodNotAllowedHttpException("You are not permitted to perform this action");
       
  }

}
?>