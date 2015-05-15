<?php

namespace app\modules\users\controllers;

use Yii;
use app\common\Utility;
use app\modules\users\models\Level;
use app\modules\users\models\LevelSearch;
use app\modules\users\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LevelController implements the CRUD actions for Level model.
 */
class LevelController extends Controller
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
     * Lists all Level models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LevelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Level model.
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
     * Creates a new Level model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
       
       
        $model = new Level();
 
        if ($model->load(Yii::$app->request->post()))
        {
           if (array_key_exists('app\modules\users\models\Level',Utility::rules()))
            foreach ($model->attributes as $attribute)
            if (Utility::rules('app\modules\users\models\Level') && array_key_exists($attribute,Utility::rules()['app\modules\users\models\Level']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\users\models\Level'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Level();; //reset model
        }
 
        $searchModel = new LevelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }

    /**
     * Updates an existing Level model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
         $model = $this->findModel($id);
       
 
        if ($model->load(Yii::$app->request->post()))
        {
        if (array_key_exists('app\modules\users\models\Level',Utility::rules()))
           
            foreach ($model->attributes as $attribute)
            if (array_key_exists($attribute,Utility::rules()['app\modules\users\models\Level']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\users\models\Level'][$model->$attribute]['required'])
            );
            if ($model->save())
            $model = new Level();; //reset model
        }
 
       $searchModel = new LevelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }
    /**
     * Deletes an existing Level model.
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
     * Finds the Level model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Level the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Level::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
