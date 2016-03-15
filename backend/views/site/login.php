<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
?>

<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<h1>ĐĂNG NHẬP</h1>
<?= $form->field($model, 'username')->textInput(['placeholder' => 'Tên đăng nhập'])->label(false) ?>
<?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Nhập mật khẩu'])->label(false) ?>
<div class="form-group">
    <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    <!--<a class="reset_pass" href="/site/forgetpassword">Quên mật khẩu?</a>-->
    <p>admin/123456</p>
</div>
<div class="clearfix"></div>
<div class="separator">
    <div>
        <h1><i class="fa fa-paw" style="font-size: 26px;"></i> GII CMS!</h1>

        <p>©2016 GII CMS</p>
    </div>
</div>
<?php ActiveForm::end(); ?>