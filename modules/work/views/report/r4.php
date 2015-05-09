<?php

use yii\helpers\Html;
use kartik\grid\GridView;

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
           ['header'=>'Value',
           
           'value'=>function($model,$key,$index,$column)
                     {
                       $cost=\app\models\MaterialType::findOne(['id'=>$model->material_type])->unitcost_1415;
                       return $model->qty.$cost;
                     },
			
           ],
        ],
			'toolbar' => [


			'{export}',
			'{toggleData}'
		],
// set export properties
		'export' => [
			'fontAwesome' => true
		],
		'panel' => [
			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Material Requirement for ' . $work->name_hi . '</h3>',
			'type' => 'success',
			'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add Material Requirement', ['/work/addmq'], ['class' => 'btn btn-success']),
			'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['/report?rt=r4&wid=' . $work->id], ['class' => 'btn btn-info']),
			'footer' => false
		],
		//'ajaxUpdate'=>true,
		'tableOptions' => ['class' => 'table table-responsive table-striped small'],
    ]); ?>

