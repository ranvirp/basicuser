<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Jeareas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jearea-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Jearea'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name_hi',
            'name_en',
            'division_id',
            'ae_area_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
