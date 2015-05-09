<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JEArea */

$this->title = 'Create Jearea';
$this->params['breadcrumbs'][] = ['label' => 'Jeareas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jearea-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
