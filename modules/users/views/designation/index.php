<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\modules\users\models\DesignationType;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\masterdata\models\DesignationTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Designations');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model!=null):?><div class="col-lg-6">
<?=$this->render('_form',['model'=>$model]) ?></div>
<div class="col-lg-6">
<?php else:?><div class="col-lg-12">
<?php endif;?><div class="designation-type-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

['header'=>'id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('id');
},],
    ['header'=>'Designation Type',
'attribute'=>'designation_type_id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('designation_type_id');
},
'filter'=>\yii\helpers\ArrayHelper::map(DesignationType::find()->asArray()->all(),'id','name_'.Yii::$app->language)
,],
['header'=>'Level',
'value'=>function($model,$key,$index,$column)
{
                return $model->designationType->level?$model->designationType->level->name_en:'Not Found'
                //.print_r($model->level,true);
                //.':'.($model->level)?$model->level->name_en:'Not Found';
                ;
},],['header'=>'Officer Name in Hindi',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('officer_name_hi');
},],['header'=>'Officer Name in English',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('officer_name_en');
},],            // 'officer_mobile',
            // 'officer_mobile1',
            // 'officer_email:email',
            // 'officer_userid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
       // 'tableOptions'=>['class'=>'small'],
    
    ]); ?>
</div>
</div>