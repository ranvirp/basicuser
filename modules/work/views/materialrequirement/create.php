<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialRequirement */

$this->title = Yii::t('app', 'Create Material Requirement');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Material Requirements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-requirement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
