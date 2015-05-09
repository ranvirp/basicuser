<?php

namespace app\modules\gpsphoto\controllers;

use Yii;
use app\models\Photo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PhotoController implements the CRUD actions for Photo model.
 */
class PhotoController extends Controller
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
     * Lists all Photo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Photo::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Photo model.
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
     * Creates a new Photo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function action1Create()
    {
        $model = new Photo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Photo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function action1Update($id)
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
     * Deletes an existing Photo model.
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
     * Finds the Photo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Photo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Photo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*
       This would show an interface to the operator about photos coming
       from the users and the user with role photooperator can 
       approve/disapprove the photo depending on whether it is appropriate
       or not.
    */
    public function actionConsole()
    {
     if (!Yii::$app->user->can('photooperator'))
        throw new NotFoundHttpException('the request page does not exist for you.');
      $approved=Yii::$app->request->post('approved');
      $id=Yii::$app->request->post('id');
      if ($id && $approved)
      {
      $model=$this->findModel($id);
      
      $model->approved=$approved;
      $model->save();
      }
      return $this->render('photoconsole');
      
      
    }
    /*
      This would display the photos given a category.
    */
    public function actionLatest($cat,$title)
    {
      //$titles=['w'=>'Works','t'=>'Theft','br'=>'BreakDown'];
      $dataProvider=new ActiveDataProvider(['query'=>\app\modules\gpsphoto\models\Photo::find()->where('bwid like :cat',[':cat'=>$cat.'%'])]);
      return $this->render('latest',['dataProvider'=>$dataProvider,'title'=>$title]);
    }
}
