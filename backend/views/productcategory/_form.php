<?php

use yii\helpers\Html;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>



<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
<?= (!$model->isNewRecord) ? $form->field($model, 'slug')->textInput(['maxlength' => true]) : "" ?>
<?= $form->field($model, 'parent_id')->dropDownList($model->getCategories('post'), ['prompt' => 'Them danh muc']) ?>
<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
<?= $form->field($model, 'type')->hiddenInput(['value' => 'product'])->label(FALSE) ?>

<div class="form-group">
    <div class="col-md-offset-3 col-md-6 col-sm-9 col-xs-12">
        <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
</div>
