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
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'content')->textarea(['class' => 'text-editor']) ?>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">

        <div class="x_panel">
            <?= $form->field($model, 'status')->dropDownList($model->postStatus) ?>
        </div>
        <div class="x_panel">
            <?=
                    $form->field($model, 'category_id')
                    ->checkboxList($model->getCategories('product'), [
                        'item' => function($index, $label, $name, $checked, $value) {
                            $check = $label['checked'] == 1 ? ' checked="checked"' : '';
                            $return = '<div class="checkbox"><label><input type="checkbox" name="' . $name . '" ' . $check . ' value="' . $label['id'] . '" >' . $label['title'] . '</label></div>';
                            return $return;
                        }
                    ])->label();
            ?>
        </div>
        <div class="x_panel">
            <?= $form->field($model, 'price')->textInput(['value' => !empty($model->price) ? number_format($model->price, 0, '', '.') : ""]) ?>
            <?= $form->field($model, 'featured')->dropDownList($model->featureds) ?>
            <?= $form->field($model, 'slide')->dropDownList($model->slides) ?>
        </div>
        <div class="x_panel">
            <div class="form-group">
                <label class="control-label">Hình ảnh</label>
                <div class="profile-avatar">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div id="image_preview">
                                <?php
                                if (!empty($model->image)) {
                                    echo '<img src="' . $model->image . '" alt="' . $model->title . '" >';
                                }
                                ?>
                            </div>
                        </div>
                    </div>    
                    <div class="row">       
                        <div class="col-md-10 col-sm-10 col-xs-9 input-avatar">
                            <?= $form->field($model, 'image')->textInput(['id' => 'fieldID'])->label(false) ?>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-3 btn-upload">
                            <a href="/filemanager/dialog.php?type=1&field_id=fieldID&akey=<?= (string) $model->id ?>" class="btn iframe-btn btn-success" type="button"><i class="fa fa-upload"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        $('#post-price').keyup(function(event) {
    if(event.which >= 37 && event.which <= 40){
    event.preventDefault();
  }

  $(this).val(function(index, value) {
    return value
      .replace(/\D/g, '')
      .replace(/([0-9])([0-9]{3})$/, '$1.$2')  
      .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, '.')
    ;
  });
});
"); ?>