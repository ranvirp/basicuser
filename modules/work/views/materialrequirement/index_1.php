<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Requirements';
$this->params['breadcrumbs'][] = $this->title;
?>


   

   

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           [
            'header'=>'Type',
			   'value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return \app\models\Materialtype::findOne($model->material_type)->$name;},
			   ],
            'qty',
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

