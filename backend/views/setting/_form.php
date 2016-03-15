<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>



<?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<div class="form-group">
    <div class="col-md-offset-3 col-md-6 col-sm-9 col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
