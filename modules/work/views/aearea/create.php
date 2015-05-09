<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AEArea */

$this->title = 'Create Aearea';
$this->params['breadcrumbs'][] = ['label' => 'Aeareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aearea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
