<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Designation */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Designation',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Designations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="designation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
