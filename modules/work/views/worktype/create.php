<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkType */

$this->title = 'Create Work Type';
$this->params['breadcrumbs'][] = ['label' => 'Work Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
