<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\work\models\MaterialRequirementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'MaterialRequirement');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model!=null):?><div class="col-lg-6">
<?=$this->render('_form',['model'=>$model]) ?></div>
<div class="col-lg-6">
<?php else:?><div class="col-lg-12">
<?php endif;?><div class="materialrequirement-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="form-title">
        <div class="form-title-span">
         <span>List of Material Required</span>
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
},],['header'=>'work_id',
'attribute'=>'work_id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('work_id');
},],['header'=>'material_type_id',
'attribute'=>'material_type_id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('material_type_id');
},],['header'=>'qty',
'attribute'=>'qty',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('qty');
},],['header'=>'value',
'attribute'=>'value',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('value');
},],['header'=>'issuedqty',
'attribute'=>'issuedqty',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('issuedqty');
},],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions'=>['class'=>'small'],
        ]); ?>

</div>
</div>