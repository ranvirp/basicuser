<?php

namespace app\modules\users\controllers;

use yii\web\Controller;
use Yii;
use \app\modules\users\Utility;

        
class UtilityController extends Controller
{
    public function actionIndex1()
    {
        return $this->render('index');
    }
	public function actionIndex()
	{
		if (Yii::$app->request->get('at')) //at===action type
		{//at=>action type
			$at=Yii::$app->request->get('at');
			switch ($at)
			{
				case 'glt': //get level type
				 $id=Yii::$app->request->get('id');
				 	if (!is_numeric(trim($id)))
						return json_encode([]);
					else 
					{
					return json_encode(Utility::getLevelsByType($id));
				 }
			     break;
			 case 'gltk'://as per requirement of krajee depdropwidget
				 $lang=Yii::$app->language;
		         $designation_type=Yii::$app->request->post('depdrop_parents')[0];
		         $y=[];
		         foreach (Utility::getLevelsByType($designation_type) as $id=>$name)
		           {
			         $x['id']=$id;
			         $x['name']=$name;
			         $y[]=$x;
		           }
		           return \yii\helpers\Json::encode(['output'=>$y,'selected'=>'']);
		           
				 
			     break;
			}
		}
	}
}
