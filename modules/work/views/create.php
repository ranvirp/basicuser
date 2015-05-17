<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\work\models\MaterialType */

$this->title = Yii::t('app', 'Create Material Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Material Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="material-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
