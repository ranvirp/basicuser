<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WorkType */

$this->title = 'Update Work Type: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Work Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="work-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
