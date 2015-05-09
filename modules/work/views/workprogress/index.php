<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkProgressSearch */
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


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

['header'=>'work_id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('work_id');
},],['header'=>'physical',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('physical');
},],['header'=>'financial',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('financial');
},],['header'=>'dateofprogress',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('dateofprogress');
},],            // 'remarks:ntext',
            // 'expenditure',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions'=>['class'=>'small table table-hover'],
    ]); ?>

</div>
</div>