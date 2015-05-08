<?php

namespace app\controllers;

use Yii;
use app\common\Utility;
use app\models\Division;
use app\models\DivisionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DivisionController implements the CRUD actions for Division model.
 */
class DivisionController extends Controller
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
     * Lists all Division models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DivisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Division model.
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
     * Creates a new Division model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
       
       
        $model = new Division();
 
        if ($model->load(Yii::$app->request->post()))
        {
           if (array_key_exists('app\models\Division',Utility::rules()))
            foreach ($model->attributes as $attribute)
            if (Utility::rules('app\models\Division') && array_key_exists($attribute,Utility::rules()['app\models\Division']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\models\Division'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Division();; //reset model
        }
 
        $searchModel = new DivisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }

    /**
     * Updates an existing Division model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
         $model = $this->findModel($id);
       
 
        if ($model->load(Yii::$app->request->post()))
        {
        if (array_key_exists('app\models\Division',Utility::rules()))
           
            foreach ($model->attributes as $attribute)
            if (array_key_exists($attribute,Utility::rules()['app\models\Division']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\models\Division'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Division();; //reset model
        }
 
       $searchModel = new DivisionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }
    /**
     * Deletes an existing Division model.
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
     * Finds the Division model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Division the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Division::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    /* 
		    * Returns list of divisions in a circle in json form 
		    */ 
		   public function actionGet() 
		   { 
		       $lang=Yii::$app->language; 
		       $circle=Yii::$app->request->post('depdrop_parents')[0]; 
		       $y=[]; 
		       foreach (\yii\helpers\ArrayHelper::map(\app\models\Division::find()->where('circle_id=:circle_id',[':circle_id'=>$circle])->asArray()->all(),'id','name_'.$lang) as $id=>$name) 
		       { 
		           $x['id']=$id; 
		           $x['name']=$name; 
		           $y[]=$x; 
		       } 
		       echo \yii\helpers\Json::encode(['output'=>$y,'selected'=>'']); 
		       return; 
		   } 
}
