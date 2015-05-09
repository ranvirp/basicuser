<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\work\models\SubstationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Substations');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model!=null):?><div class="col-lg-6">
<?=$this->render('_form',['model'=>$model]) ?></div>
<div class="col-lg-6">
<?php else:?><div class="col-lg-12">
<?php endif;?><div class="substation-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

['header'=>'id',
'attribute'=>'id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('id');
},],['header'=>'code',
'attribute'=>'code',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('code');
},],['header'=>'name_hi',
'attribute'=>'name_hi',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('name_hi');
},],['header'=>'name_en',
'attribute'=>'name_en',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('name_en');
},],['header'=>'substation_type',
'attribute'=>'substation_type',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('substation_type');
},],            // 'voltageratio',
            // 'mva',
            // 'mvarmax',
            // 'mvamax',
            // 'notrf',
            // 'capacity',
            // 'division_id',
            // 'remarks:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions'=>['class'=>'small'],
        ]); ?>

</div>
</div>