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
                <?= $form->field($model,'oldpassword')->passwordInput(['id'=>'oldpassword'])->hint('Please type your old password')->label('Old password') ?>
                <?= $form->field($model,'newpassword')->passwordInput()->hint('Please type your new password')->label('New password')?>
                <?= $form->field($model,'newpasswordrepeat')->passwordInput()->hint('Please retype your new password')->label('New password')?>
                
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
