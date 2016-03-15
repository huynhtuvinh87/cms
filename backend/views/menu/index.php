
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
use common\models\Post;
use common\models\Category;

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
                <small>
                    <a href="/menu/create" class="btn btn-success">Thêm mới</a>
                </small>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Danh mục</h2>
                    <ul class="nav navbar-right panel_toolbox text-right">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display:none">
                    <ul class="nav">
                        <?php
                        if (!empty($category)) {
                            foreach ($category as $value) {
                                ?>
                                <li>
                                    <div class="checkbox">
                                        <?= common\models\Menu::getIndent($value['indent']) ?>
                                        <label>
                                            <input type="checkbox" value="">
                                            <?= $value['title'] ?>
                                        </label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pages</h2>
                    <ul class="nav navbar-right panel_toolbox text-right">
                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display:none">
                    <ul class="nav">
                        <?php
                        if (!empty($page)) {
                            foreach ($page as $value) {
                                ?>
                                <li>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="">
                                            <?= $value->title ?>
                                        </label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Menu</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="sortable" class="tree-menu">
                        <ul>
                            <li id="10">Item ID 1
                                <ul>
                                    <li id="20">Subitem ID 2
                                        <ul id="20">

                                        </ul>
                                    </li>
                                    <li id="30">Subitem ID 3</li>
                                </ul>
                            </li>
                            <li id="40">Item ID 4
                                <ul id="40"></ul>
                            </li>
                            <li id="50">Item ID 5
                                <ul id="50"></ul>
                            </li>
                            <li id="60">Item ID 6
                                <ul id="60"></ul>
                            </li>
                        </ul>
                    </div>
                    <div id="result">Reordenar para obtener resultados...</div>

                </div>
            </div>
        </div>
    </div>
    <?= $this->registerJs('
//        $(function(){
//    $( "#sortable ul" ).sortable({
//        connectWith: "#sortable ul",
//        placeholder: "ui-state-highlight",
//        distance: 5,
//        update: function(event, ui){
//            
//            var newOrder = $(this).sortable("toArray").toString();
//            var _parent = Number(ui.item[0].parentElement.id);
//            var id_item = ui.item[0].id;
//            if (!isNaN(_parent))
//                id_parent = _parent;
//            $("#menu-order").val(newOrder);
//            $("#menu-id").val(id_item);
//            $("#menu-parent_id").val(id_parent);
//            $("#result").html("Datos a enviar: order=" + newOrder + "&parent=" + id_parent + "&id=" + id_item)
//
//            $.ajax({
//                url: "/menu/order",
//                data: "order=" + newOrder + "&parent=" + id_parent + "&id=" + id_item,
//                type: "POST"
//            });
//        }
//    });
//});
            ') ?>
    <style>
        .ui-state-highlight { border: 1px solid #f9a837; background: #fff0a5; padding: 10px 0; }
        #sortable li { cursor: move; }

        .tree-menu label { font-weight: normal; }
        .tree-menu ul { min-height: 10px; margin: 0 auto; list-style-type: none; }
        .tree-menu > ul { padding: 0; }
        .tree-menu li { padding-left: 18px; margin-bottom: 5px; }
    </style>