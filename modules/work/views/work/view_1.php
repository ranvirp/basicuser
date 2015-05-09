<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Work */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Works'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name_hi:ntext',
            'name_en:ntext',
            'agency',
            'dateofsanction',
            'dateoffundsreceipt',
            'dateofstart',
            'totvalue',
            'dept_id',
            'work_type_id',
            'address',
            'gpslat',
            'gpslong',
            'loc',
            'status',
            'scheme_id',
            'work_admin',
            'fromloc:ntext',
            'toloc:ntext',
            'substation_id',
            'division_id',
            'package_no',
            'work_id',
            'phy',
            'fin',
            'dateofprogress',
            'remarks:ntext',
            'feeder_id',
        ],
    ]) ?>

</div>
