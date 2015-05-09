<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Work */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Works'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
