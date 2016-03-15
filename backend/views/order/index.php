<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use common\models\Order;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bài viết';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                QUẢN LÝ ĐƠN HÀNG
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
                    echo Menu::widget([
                        'items' => [
                            ['label' => 'Thêm mới', 'template' => '<a href="{url}" class="btn-success">{label}</a>', 'url' => [ 'create']]
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
                        'summary' => "<p>Hiển thị {begin} đến {end} trong tổng số {count} mục</p>",
                        'layout' => "{pager}\n{items}\n{summary}\n{pager}",
                        'columns' => [
                            [
                                'class' => 'yii\grid\CheckboxColumn',
                                'multiple' => true,
                            ],
                            ['class' => 'yii\grid\SerialColumn'],
                            'code',
                            [
                                'attribute' => 'user_id',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->user->username;
                                }
                            ],
                            [
                                'attribute' => 'post_id',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return $data->post->title;
                                }
                            ],
                            'number',
                            [
                                'attribute' => 'created_at',
                                'format' => 'raw',
                                'value' => function($data) {
                                    return date('d/m/Y', $data->created_at);
                                }
                            ],
                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                        'tableOptions' => ['class' => ' table table-striped responsive-utilities jambo_table bulk_action'],
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->registerJs('$("[name=status]").bootstrapSwitch({onText:"&nbsp;",offText:"&nbsp;",onColor:"default",offColor:"default"});') ?>
<?= $this->registerJs('
$("input[name=status]").on("switchChange.bootstrapSwitch", function(event, state) {
    var key = $(this).parent().parent().parent().parent("tr").attr("data-key");
        $.ajax({type: "POST", url:"' . Yii::$app->urlManager->createUrl(["category/publish"]) . '", data: {id: key,state:state}, success: function (data) {
            }, });
});
') ?>