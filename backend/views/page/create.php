<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = 'Thêm mới';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= Html::encode($this->title) ?>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <?=
        $this->render('_form', [
            'model' => $model,
        ])
        ?>

    </div>
</div>