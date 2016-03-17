<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$this->title = 'Cập nhật  ' . $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstname . ' ' . $model->lastname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="user-update">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= Html::encode($this->title) ?>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="auth-item-form">
        <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

        <div class="x_panel">
            <div class="row">
                <div class="col-sm-6">

                    <?= $form->field($profile, 'email')->textInput(['value' => $model->email]) ?>

                    <?= $form->field($profile, 'firstname')->textInput(['value' => $model->firstname]) ?>

                    <?= $form->field($profile, 'lastname')->textInput(['value' => $model->lastname]) ?>

                    <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>


    </div>

</div>
