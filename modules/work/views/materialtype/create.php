<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaterialType */

$this->title = 'Create Material Type';
$this->params['breadcrumbs'][] = ['label' => 'Material Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
