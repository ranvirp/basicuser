<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\WorkProgress */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Work Progress',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Work Progresses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-progress-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
