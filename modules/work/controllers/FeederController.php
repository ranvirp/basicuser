<?php

namespace app\controllers;

use Yii;
use app\models\Feeder;
use app\models\FeederSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FeederController implements the CRUD actions for Feeder model.
 */
class FeederController extends Controller
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
     * Lists all Feeder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeederSearch();
		 /*
		$x=Yii::$app->request->post('Feeder');
		$model=\app\models\Feeder::findOne($x['id']);
		if ($model && $model->load(Yii::$app->request->post()))
			if(!$model->save())
			{
				print_r( $model->errors);
				print_r($model);
				exit;
			}
		  * 
		  */
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index_update', [
            //'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	public function actionAjaxupdate()
	{
		$model = new Feeder();
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return;
		}
	}

    /**
     * Displays a single Feeder model.
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
     * Creates a new Feeder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Feeder();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Feeder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Feeder model.
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
     * Finds the Feeder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Feeder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Feeder::findOne($id)) !== null) {
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
		$substation=Yii::$app->request->post('depdrop_parents')[0];
		$y=[];
		foreach (\yii\helpers\ArrayHelper::map(\app\models\Feeder::find()->where('substation_id=:substation_id',[':substation_id'=>$substation])->asArray()->all(),'id','name_'.$lang) as $id=>$name)
		{
			$x['id']=$id;
			$x['name']=$name;
			$y[]=$x;
		}
		echo \yii\helpers\Json::encode(['output'=>$y,'selected'=>'']);
		return;
	}
}
