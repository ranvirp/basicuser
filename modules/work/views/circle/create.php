<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Circle */

$this->title = 'Create Circle';
$this->params['breadcrumbs'][] = ['label' => 'Circles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="circle-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
