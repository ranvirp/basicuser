<?php

use \kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reply */

$this->title = 'Create Reply';
$this->params['breadcrumbs'][] = ['label' => 'Replies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p class="well">
<?=$parentcontent?>
</p>
<div class="reply-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
