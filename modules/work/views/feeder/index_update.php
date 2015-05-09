<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeederSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Feeders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Feeder',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(['id' => 'feeders','enableReplaceState'=>true]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
		'pjax'=>true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'id',
				'value'=>function($model,$key,$index,$column){
				return $model->id;
		//'<form data-pjax="1" action="'.\yii\helpers\Url::to(['/feeder/ajaxupdate']).'">';
		},
			'format'=>'raw'
			],
            ['attribute'=>'substation_id',
			 'value'=>function($model,$key,$index,$column){
		        return Html::activeDropDownList($model,'substation_id',
					\yii\helpers\ArrayHelper::map(\app\models\Substation::find()->orderBy('name_en desc')->asArray()->all(),'id','name_en'));
			 },
'format'=>'raw'				 ],
			 
            'substation_id',
            'substation_name',
            //'pwtrfcty',
            ['attribute'=> 'pwtrfid',
				'value'=>function($model,$key,$index,$column)
			 {
				 $x=	'<form data-pjax="" method="post">';
				 $x.=Html::activeDropDownList($model,'substation_id',
					\yii\helpers\ArrayHelper::map(\app\models\Substation::find()->orderBy('name_en desc')->asArray()->all(),'id','name_en'));
				 $x.=Html::activeTextInput($model,'pwtrfid');
				 $x.=Html::activeHiddenInput($model,'id');
				 return $x.'<input type="Submit" data-pjax="" value="Save">'."</form>";
			 },'format'=>'raw'			 ],
            // 'typeofconductor',
            // 'peakdemand',
            // 'transformerdesc',
            // 'totalcapacity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end();?>
</div>
