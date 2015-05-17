<?php

namespace app\modules\work\controllers;

use Yii;
use app\common\Utility;
use app\modules\work\models\Circle;
use app\modules\work\models\CircleSearch;
use app\modules\work\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CircleController implements the CRUD actions for Circle model.
 */
class CircleController extends Controller
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
     * Lists all Circle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CircleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>new Circle,
        ]);
    }

    /**
     * Displays a single Circle model.
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
     * Creates a new Circle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
       
       
        $model = new Circle();
 
        if ($model->load(Yii::$app->request->post()))
        {
           if (array_key_exists('app\modules\work\models\Circle',Utility::rules()))
            foreach ($model->attributes as $attribute)
            if (Utility::rules('app\modules\work\models\Circle') && array_key_exists($attribute,Utility::rules()['app\modules\work\models\Circle']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\work\models\Circle'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Circle();; //reset model
        }
 
        $searchModel = new CircleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }

    /**
     * Updates an existing Circle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
         $model = $this->findModel($id);
       
 
        if ($model->load(Yii::$app->request->post()))
        {
        if (array_key_exists('app\modules\work\models\Circle',Utility::rules()))
           
            foreach ($model->attributes as $attribute)
            if (array_key_exists($attribute,Utility::rules()['app\modules\work\models\Circle']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\work\models\Circle'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Circle();; //reset model
        }
 
       $searchModel = new CircleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }
    /**
     * Deletes an existing Circle model.
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
     * Finds the Circle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Circle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Circle::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
