<?php

use yii\data\ActiveDataProvider;
//http://www.yiiframework.com/wiki/679/filter-sort-by-summary-data-in-gridview-yii-2-0/
use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "List of Works for " . $scheme->name_en;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="work-index small">


	<?php
	$gridColumns = [
		['class' => '\yii\grid\SerialColumn'],
		['header' => 'Division',
			'attribute' => 'division_id',
			'filter' => \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(), 'id', 'name_en'),
			'value' => function($model, $key, $index, $column) {
			$div = \app\models\Division::findOne($model->division_id);
			return $div ? $div->name_en : 'Not found';
		}
		],
		'name_' . Yii::$app->language . ':ntext',
		[
			'header' => 'Work Type',
			'attribute' => 'work_type_id',
			'filter' => \yii\helpers\ArrayHelper::map(\app\models\WorkType::find()->asArray()->all(), 'id', 'name_en'),
			'value' => function($model, $key, $index, $column) {
			$name = 'name_' . Yii::$app->language;
			return $model->workType ? $model->workType->$name : '';
		}
		],
		'address',
		['header' => 'Agency', 'value' => function($model, $key, $index, $column) {
			$name = 'name_' . Yii::$app->language;
			return $model->agency0 ? $model->agency0->$name : '';
		},],
		'totvalue',
		'dateofsanction',
		['class' => 'yii\grid\ActionColumn'],
	];
	$searchModel = new \app\models\WorkSearch;
	echo GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => $gridColumns,
		'toolbar' => [


			'{export}',
			'{toggleData}'
		],
// set export properties
		'export' => [
			'fontAwesome' => true
		],
		'panel' => [
			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> List of Works for ' . $scheme->name_hi . '</h3>',
			'type' => 'success',
			'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create Work', ['/work/create'], ['class' => 'btn btn-success']),
			'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['/report?rt=r2&sid=' . $scheme->id], ['class' => 'btn btn-info']),
			'footer' => false
		],
		//'ajaxUpdate'=>true,
		'tableOptions' => ['class' => 'table table-responsive table-striped small'],
	]);
	?>

</div>



