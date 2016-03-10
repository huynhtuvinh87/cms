
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use common\models\Post;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                QUẢN LÝ MENU
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
                    <div>
                        <div class="dd" id="nestable3">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="1">
                                    <div class="dd-handle">Item 1</div>
                                </li>
                                <li class="dd-item" data-id="2">
                                    <div class="dd-handle">Item 2</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
                                        <li class="dd-item" data-id="4"><div class="dd-handle">Item 4</div></li>
                                        <li class="dd-item" data-id="5">
                                            <div class="dd-handle">Item 5</div>
                                            <ol class="dd-list">
                                                <li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
                                                <li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
                                                <li class="dd-item" data-id="8"><div class="dd-handle">Item 8</div></li>
                                            </ol>
                                        </li>
                                        <li class="dd-item" data-id="9"><div class="dd-handle">Item 9</div></li>
                                        <li class="dd-item" data-id="10"><div class="dd-handle">Item 10</div></li>
                                    </ol>
                                </li>
                                <li class="dd-item" data-id="11">
                                    <div class="dd-handle">Item 11</div>
                                </li>
                                <li class="dd-item" data-id="12">
                                    <div class="dd-handle">Item 12</div>
                                </li>
                            </ol>
                        </div>

<!--                        <div class="dd" id="nestable2">
                            <ol class="dd-list">
                                <li class="dd-item" data-id="13">
                                    <div class="dd-handle">Item 13</div>
                                </li>
                                <li class="dd-item" data-id="14">
                                    <div class="dd-handle">Item 14</div>
                                </li>
                                <li class="dd-item" data-id="15">
                                    <div class="dd-handle">Item 15</div>
                                    <ol class="dd-list">
                                        <li class="dd-item" data-id="16"><div class="dd-handle">Item 16</div></li>
                                        <li class="dd-item" data-id="17"><div class="dd-handle">Item 17</div></li>
                                        <li class="dd-item" data-id="18"><div class="dd-handle">Item 18</div></li>
                                    </ol>
                                </li>
                            </ol>
                        </div>-->

                    </div>
<!--                    <textarea id="nestable-output"></textarea>
                    <textarea id="nestable2-output"></textarea>-->
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->registerJs("

$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
//    $('#nestable').nestable({
//        group: 1
//    })
//    .on('change', updateOutput);
//
//    // activate Nestable for list 2
//    $('#nestable2').nestable({
//        group: 1
//    })
//    .on('change', updateOutput);
//
//    // output initial serialised data
//    updateOutput($('#nestable').data('output', $('#nestable-output')));
//    updateOutput($('#nestable2').data('output', $('#nestable2-output')));
//
//    $('#nestable-menu').on('click', function(e)
//    {
//        var target = $(e.target),
//            action = target.data('action');
//        if (action === 'expand-all') {
//            $('.dd').nestable('expandAll');
//        }
//        if (action === 'collapse-all') {
//            $('.dd').nestable('collapseAll');
//        }
//    });

    $('#nestable3').nestable();

});
"); ?>