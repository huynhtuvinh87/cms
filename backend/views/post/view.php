<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
            <h2>Mô tả</h2>
            <p><?= $model->description ?></p>
            <h2>Nội dung</h2>
            <p><?= $model->content ?></p>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">

        <div class="x_panel">
        </div>

        <div class="x_panel">

        </div>
        <div class="x_panel">
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

                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Thêm mới' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success pull-right' : 'btn btn-primary pull-right']) ?>

        </div>
    </div>

</div>
