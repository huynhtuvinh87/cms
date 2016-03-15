<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <?= $form->field($model, 'post_id')->textInput(['maxlength' => true]) ?>
               <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>

        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?= $this->registerJs("
	$('.iframe-btn').fancybox({
	  'width'	: 880,
	  'height'	: 570,
	  'type'	: 'iframe',
	  'autoScale'   : false
      });
	$(function() {
		$('#fieldID').observe_field(1, function( ) {
			$('#image_preview').html('<img src='+this.value+'>');
		});
	});
"); ?>