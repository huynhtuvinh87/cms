<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\components\RouteRule;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>

<div class="auth-item-form">
    <?php $form = ActiveForm::begin(['id' => 'item-form']); ?>

    <div class="x_panel">
        <div class="row">
            <div class="col-sm-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

                <?= $form->field($model, 'description')->textarea(['rows' => 2]) ?>

                <?= $form->field($model, 'ruleName')->dropDownList($rules, ['prompt' => ' --select rule']) ?>

                <?= $form->field($model, 'data')->textarea(['rows' => 6]) ?>

                <?php
                echo Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', [
                    'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                    'name' => 'submit-button'])
                ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>


</div>
