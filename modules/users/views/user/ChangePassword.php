<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-changepassword">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to Change Password:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'changepassword-form']); ?>
                <?= Html::passwordInput('oldpassword')->hint('Please type your old password')->label('Old password') ?>
                <?= Html::passwordInput('newpassword')->hint('Please type your new password')->label('New password')?>
                <?= Html::passwordInput('newpasswordrepeat')->hint('Please retype your old password')->label('New password')?>
                
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
