<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\work\models\MaterialTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Material Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model!=null):?><div class="col-lg-6">
<?=$this->render('_form',['model'=>$model]) ?></div>
<div class="col-lg-6">
<?php else:?><div class="col-lg-12">
<?php endif;?><div class="material-type-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="form-title">
        <div class="form-title-span">
         <span>List of MaterialType</span>
        </div>
    </div>
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
},],['header'=>'unitcost_1314',
'attribute'=>'unitcost_1314',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('unitcost_1314');
},],['header'=>'unitcost_1415',
'attribute'=>'unitcost_1415',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('unitcost_1415');
},],            // 'unitcost_1516',
            // 'unit_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions'=>['class'=>'small'],
        ]); ?>

</div>
</div>