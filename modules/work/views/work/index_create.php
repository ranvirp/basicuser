<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Works');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
.work-index
 {
 	box-shadow: 0 2px 8px hsla(0, 0%, 0%, 0.3);
 	font-size:15px;
    
 }
 .work-index input
 {
 	font-size:15px;
 }
</style>
<div class="container">
<?php if ($model==null):?><div class="col-md-12">

<?php else:?><div class="col-md-12">
<?php endif;?>
<div class="work-index">
  <div class="form-title">
  	<div class="form-title-span">
  		<span>List of Works</span>
  	</div>
  </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    
<?php 
	$gridColumns = [
	/*
	['header'=>'Put Photo',
	'format'=>'raw',
	  'value'=>function($model,$key,$index,$column)
	            {
	               return Html::a('click','gpsphu://w'.$model->id);
	            }
	],
	*/
            ['class' => '\yii\grid\SerialColumn'],
		

        'workid',
		['header'=>'Division',
			'attribute'=>'division_id',
		 'value'=>function($model,$key,$index,$column){return $model->division?$model->division->name_en:'';},
         'filter'=>\yii\helpers\ArrayHelper::map(\app\modules\work\models\Division::find()->asArray()->all(),'id','name_en')
			 ],
			 
            'name_'.Yii::$app->language.':ntext',
		 ['header'=>'Work Type','attribute'=>'work_type_id','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->workType?$model->workType->$name:'';},
		'filter'=>\yii\helpers\ArrayHelper::map(\app\modules\work\models\WorkType::find()->asArray()->all(),'id','name_en'),
		],
			
            /*
			['header'=>'Department','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->dept?$model->dept->$name:'';}],
			*/
			'totvalue',
			//'dateofsanction',
			
			

            ['class' => '\yii\grid\ActionColumn'
			  
			 ],
        
    ]; 
	//$model1=new \app\models\WorkSearch;		
	$filters='';//to be identified later
	?>
	<?php     echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,

    'columns' => $gridColumns,
		'tableOptions'=>['class'=>'small table table-striped'],
   
    ]);?>
</div>
</div>

<?php if ($model!=null):?><div class="col-md-12">
<?=$this->render('_form',['model'=>$model]) ?></div>
<?php endif;?>
</div>

