<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Civil */

$this->title = 'Update Civil: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Civils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="civil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
