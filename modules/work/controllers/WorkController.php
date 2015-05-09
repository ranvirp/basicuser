<?php

namespace app\modules\work\controllers;

use Yii;
use app\common\Utility;
use app\modules\work\models\Work;
use app\modules\work\models\WorkSearch;
use app\modules\work\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \app\modules\work\models\MaterialRequirement;
use yii\data\ActiveDataProvider;	
use app\modules\work\models\WorkProgress;

/**
 * WorkController implements the CRUD actions for Work model.
 */
class WorkController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Work models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>null,
        ]);
    }

    /**
     * Displays a single Work model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Work model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
       
       
        $model = new Work();
 
        if ($model->load(Yii::$app->request->post()))
        {
           if (array_key_exists('app\modules\work\models\Work',Utility::rules()))
            foreach ($model->attributes as $attribute)
            if (Utility::rules(Work) && array_key_exists($attribute,Utility::rules()['app\modules\work\models\Work']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\work\models\Work'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Work();; //reset model
        }
 
        $searchModel = new WorkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'x'=>[],
            
            
        ]);

    }

    /**
     * Updates an existing Work model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
         $model = $this->findModel($id);
       
 
        if ($model->load(Yii::$app->request->post()))
        {
        if (array_key_exists('app\modules\work\models\Work',Utility::rules()))
           
            foreach ($model->attributes as $attribute)
            if (array_key_exists($attribute,Utility::rules()['app\modules\work\models\Work']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\work\models\Work'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Work();; //reset model
        }
 
       $searchModel = new WorkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }
    /**
     * Deletes an existing Work model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Work model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Work the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Work::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionAddwp($id=1)
    {
      $model = new WorkProgress();
        $model->work_id=$id;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
           $work=Work::findOne($id);
           if ($work->dateofprogress<$model->dateofprogress)
              {
                $work->dateofprogress=$model->dateofprogress;
                $work->save();
              }
            $model = new WorkProgress();
			$model->work_id=$id;//reset model
        }
 
       
        $dataProvider = new ActiveDataProvider(['query'=>WorkProgress::find()->where('work_id='.$id)->orderBy('dateofprogress desc')]);
 
        $data= $this->renderPartial('/workprogress/index', [
            'searchModel' => new \app\models\WorkProgressSearch(),
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
         $searchModel = new WorkSearch();
        $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index_wp', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider1,
            'data' => $data,
            'x'=>[],
            
            
        ]);
    }
    public function actionAddmq($id=0)
	{
	  if ($id>0) {//some entry from parameter
	   $model = new MaterialRequirement();
        $model->work_id=$id;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            $model = new MaterialRequirement();
			$model->work_id=$id;//reset model
        }
 
       
        $dataProvider = new ActiveDataProvider(['query'=>MaterialRequirement::find()->where('work_id='.$id)->orderBy('id desc')]);
 
        $data= $this->renderPartial('/materialrequirement/index_simple', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
        } else
           $data='';
         $searchModel = new WorkSearch();
        $dataProvider1 = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index_mq', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider1,
            'data' => $data,
            'x'=>[],
            
            
        ]);

	}
    
}
