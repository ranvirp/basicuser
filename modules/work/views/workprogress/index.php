<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\work\models\WorkProgressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Work Progresses');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model!=null):?><div class="col-lg-6">
<?=$this->render('_form',['model'=>$model]) ?></div>
<div class="col-lg-6">
<?php else:?><div class="col-lg-12">
<?php endif;?><div class="work-progress-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="form-title">
        <div class="form-title-span">
         <span>List of WorkProgress</span>
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
},],['header'=>'exp',
'attribute'=>'exp',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('exp');
},],['header'=>'phy',
'attribute'=>'phy',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('phy');
},],['header'=>'fin',
'attribute'=>'fin',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('fin');
},],            // 'dateofprogress',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions'=>['class'=>'small'],
        ]); ?>

</div>
</div>