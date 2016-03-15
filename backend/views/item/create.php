<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => $labels['Item'], 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= Html::encode($this->title) ?>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
