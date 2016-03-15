<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = 'Cập nhật ' . $labels['Item'] . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => $labels['Items'], 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = 'Cập nhật';
?>
<div class="auth-item-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
