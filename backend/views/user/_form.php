<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="auth-item-form">
    <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

    <div class="x_panel">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'firstname') ?>

                <?= $form->field($model, 'lastname') ?>

                <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>
