<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = 'Assignment' . ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => 'Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;

YiiAsset::register($this);
$opts = Json::htmlEncode([
            'assignUrl' => Url::to(['assign', 'id' => (string) $model->$idField]),
            'items' => $items
        ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
?>
<div class="assignment-index">
    <h1><?= $this->title ?></h1>
    <div class="x_panel">
        <div class="row">
            <div class="col-sm-5">
                <input class="form-control search" data-target="avaliable"
                       placeholder="Search for avaliable">
                <select multiple size="20" class="form-control list" data-target="avaliable">
                </select>
            </div>
            <div class="col-sm-1">
                <br><br>
                <a href="#" class="btn btn-success btn-assign" data-action="assign">&gt;&gt;
                    <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i></a><br>
                <a href="#" class="btn btn-danger btn-assign" data-action="remove">&lt;&lt;
                    <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i></a>
            </div>
            <div class="col-sm-5">
                <input class="form-control search" data-target="assigned"
                       placeholder="Search for assigned">
                <select multiple size="20" class="form-control list" data-target="assigned">
                </select>
            </div>
        </div>
    </div>
</div>
