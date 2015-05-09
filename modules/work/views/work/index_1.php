<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Works');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_hi:ntext',
            'name_en:ntext',
            'agency',
            'dateofsanction',
            // 'dateoffundsreceipt',
            // 'dateofstart',
            // 'totvalue',
            // 'dept_id',
            // 'work_type_id',
            // 'address',
            // 'gpslat',
            // 'gpslong',
            // 'loc',
            // 'status',
            // 'scheme_id',
            // 'work_admin',
            // 'fromloc:ntext',
            // 'toloc:ntext',
            // 'substation_id',
            // 'division_id',
            // 'package_no',
            // 'work_id',
            // 'phy',
            // 'fin',
            // 'dateofprogress',
            // 'remarks:ntext',
            // 'feeder_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
