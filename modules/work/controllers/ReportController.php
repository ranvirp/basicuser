<?php

namespace app\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\Html;


/**
 * CircleController implements the CRUD actions for Circle model.
 */
class ReportController extends Controller
{
    
   public function actionIndex($rt)
   {
	   switch($rt)
	   {
		   /*
		    * List of Schemes with details of works taken up and total cost etc.
		    */
		   case 'r1':
			   return $this->render('r1');
		   break;
	   /*
	    * List of works Scheme wise with option to filter results by division etc.
	    */
		   case 'r2':
			   $sid=Yii::$app->request->get('sid');
			   
			   $scheme= \app\models\Scheme::findOne($sid);
               if (!$scheme)
                  {
		   $x='<p><h2>To see list of works , select a scheme </h2></p>';
	                  return $this->renderContent( $x.Html::dropDownList('schemedropdown','',
\yii\helpers\ArrayHelper::map(\app\models\Scheme::find()->asArray()->all(),'id','name_en'),
						  ['prompt'=>'None','onChange'=>'window.location.replace("'.\yii\helpers\Url::to(['/report?rt=r2&sid=']).'"+$(this).val())'])					  
                  );
					  
				  }
		   
               $dataProvider = new ActiveDataProvider([
                  'query' => $scheme->getWorks(),
               ]);
			   $searchModel=new \app\models\WorkSearch;
			   $params=Yii::$app->request->queryParams;
			   $searchModel->load($params);
			   if (array_key_exists('WorkSearch',$params))
			   $dataProvider->query=$searchModel->query($dataProvider->query);
			   return $this->render('r2',['dataProvider'=>$dataProvider,'scheme'=>$scheme,
                  'searchModel'=>$searchModel				   ]);
		   break;
		   /*
		    * List of material requirements for a scheme 
		    */
		   case 'r3':
			   $sid=Yii::$app->request->get('sid');
			   
			   $scheme= \app\models\Scheme::findOne($sid);
               $scheme= \app\models\Scheme::findOne($sid);
               if (!$scheme)
                  {
		   $x='<p><h2>To see list of material requirements for a scheme , select a scheme </h2></p>';
	                  return $this->renderContent( $x.Html::dropDownList('schemedropdown','',
\yii\helpers\ArrayHelper::map(\app\models\Scheme::find()->asArray()->all(),'id','name_en'),
						  ['prompt'=>'None','onChange'=>'window.location.replace("'.\yii\helpers\Url::to(['/report?rt=r3&sid=']).'"+$(this).val())'])					  
                  );
					  
				  }
		   
               $dataProvider = new ActiveDataProvider([
                  'query' => \app\models\MaterialRequirement::find()->innerJoin('work','material_requirement.work_id=work.id')->innerJoin('scheme','work.scheme_id=scheme.id')
				             ->select('material_type,count(*) as cnt,sum(qty) as totqty')->groupBy('material_type'),
               ]);
			   return $this->render('r3',['dataProvider'=>$dataProvider,'scheme'=>$scheme,
		   ]);
		   break;
		   case 'r4':
			   $wid=Yii::$app->request->get('wid');
			   
			   $work= \app\models\Work::findOne($wid);
               if (!$work)
                  {
		   $x='<p><h2>To see list of material required , select a work </h2></p>';
	                  return $this->renderContent( $x.Html::dropDownList('workdropdown','',
\yii\helpers\ArrayHelper::map(\app\models\Work::find()->asArray()->all(),'id','name_en'),
						  ['prompt'=>'None','onChange'=>'window.location.replace("'.\yii\helpers\Url::to(['/report?rt=r4&wid=']).'"+$(this).val())'])					  
                  );
					  
				  }
		   
               $dataProvider = new ActiveDataProvider([
                  'query' => \app\models\MaterialRequirement::find()->where('work_id='.$wid)
				                ]);
			   return $this->render('r4',['dataProvider'=>$dataProvider,'work'=>$work,
		   ]);
		   break;
		   /* List of works where Progress has not been added:
		    * Type: Data Entry
		    */
		   case 'ex1':
			   $dataProvider=new ActiveDataProvider([
				   'query'=>\app\models\WorkSearch::listProgressNotAdded(),
				   ]);
			   return $this->render('/work/index',['dataProvider'=>$dataProvider]);
			   break;
		   default:
		   break;
	   }
   }
}
