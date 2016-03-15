<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\grid\GridView;
use backend\components\RouteRule;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\AuthItemSearch */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
$this->title = $labels['Items'];
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="role-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= $this->title ?>
                <!-- <small>
                    Some examples to get you started
                </small> -->
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh sách</h2>
                    <?php
                    echo Menu::widget([ 'items' => [
                            [ 'label' => 'Thêm mới', 'template' => '<a href="{url}" class="btn-success">{label}</a>', 'url' => [ 'create']]
                        ],
                        'options' => [ 'class' => 'nav navbar-right panel_toolbox'],
                    ]);
                    ?>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'summary' => "<p>Hiển thị {begin} đến {end} trong tổng số {count} mục</p>",
                        'layout' => "{pager}\n{items}\n{summary}\n{pager}",
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                            ],
                            [
                                'attribute' => 'ruleName',
                                'filter' => $rules
                            ],
                            [
                                'attribute' => 'description',
                            ],
                            ['class' => 'yii\grid\ActionColumn',],
                        ],
                    ])
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>