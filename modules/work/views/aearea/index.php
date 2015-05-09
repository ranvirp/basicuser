<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aeareas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aearea-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aearea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name_hi',
            'name_en',
            'division_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
