<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <?php 
	$gridColumns = [
            ['class' => '\kartik\grid\SerialColumn'],
		

        'work_id',
		['header'=>'Division',
			'attribute'=>'division_id',
		 'value'=>function($model,$key,$index,$column){return $model->division?$model->division->name_en:'';},
         'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id','name_en')
			 ],
			 
            'name_'.Yii::$app->language.':ntext',
		 ['header'=>'Work Type','attribute'=>'work_type_id','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->workType?$model->workType->$name:'';},
		'filter'=>\yii\helpers\ArrayHelper::map(\app\models\WorkType::find()->asArray()->all(),'id','name_en'),
		],
			
            /*
			['header'=>'Department','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->dept?$model->dept->$name:'';}],
			*/
			'totvalue',
			//'dateofsanction',
			
			

            ['class' => '\kartik\grid\ActionColumn',
			  'template'=>'{addmatreq}',
				'buttons'=>['addmatreq'=>function($url,$model,$key)
		{return Html::a('Add Material Requirement',$url);},
			],
			'urlCreator'=>function($action,$model,$key,$index)
		{
			if ($action=='addmatreq') 
			{
				return \yii\helpers\Url::to(['/materialrequirement/form?wid='.$model->id]);
			}
		}
			 ],
        
    ]; 
	$model1=new \app\models\WorkSearch;		
	$filters='';//to be identified later
	?>
	<?php     echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $model1,
		'afterRow'=>function($model,$key,$index,$grid)
	     {
		$dop=$model->dateofprogress?date('d/m/Y',strtotime($model->dateofprogress)):'Not Entered';
		 return '<tr><td colspan="12" style="text-align:center">Date of Progress:'.$dop.'</td></tr>';
		/*
		    $wp=\app\models\WorkProgress::find()->where('work_id='.$model->id)->orderBy('dateofprogress desc')->one();
			  $physical=$wp?$wp->physical.'%':'Not enetered';
			  $dop=$wp?date('d/m/Y',strtotime($wp->dateofprogress)):'Not enetered';
			  return '<tr><td colspan="12" style="text-align:center">'.$model->status.' Date of Progress:'.$dop.'</td></tr>';
		 * */
		 
		 },
    'columns' => $gridColumns,
		//'tableOptions'=>['class'=>'small'],
    'containerOptions' => ['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax' => true, // pjax is set to always true for this demo
		/*
    'beforeHeader'=>[
    [
    'columns'=>[
    ['content'=>'Header Before 1', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
    ['content'=>'Header Before 2', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
    ['content'=>'Header Before 3', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
    ],
    'options'=>['class'=>'skip-export'] // remove this row from export
    ]
    ],
		*/
    // set your toolbar
    'toolbar' => [
    ['content'=>
    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Add Progress'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the progress updation form");']) . ' '.
    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
    ],
    '{export}',
    '{toggleData}',
    ],
    // set export properties
    'export' => [
    'fontAwesome' => true
    ],
    // parameters from the demo form
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'showPageSummary' => true,
    'panel' => [
			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> List of Works' . '</h3>',
			'type' => 'success',
			'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create Work', ['/work/create'], ['class' => 'btn btn-success']).'<h3>'.$filters.'</h3>',
			'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['/work'], ['class' => 'btn btn-info']),
			'footer' => false
		],
    //'exportConfig' => $exportConfig,
    ]);?>
	

</div>
