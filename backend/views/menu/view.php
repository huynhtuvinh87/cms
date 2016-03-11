
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Menu;
use common\models\Post;
use common\models\Category;
use common\models\MenuItem;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <div class="page-title">
        <div class="title_left">
            <h3>
                <?= $this->title ?>
            </h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php $form = ActiveForm::begin(['id' => 'formMenu']); ?>
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
                                            <input type="checkbox" name="category[]" value="<?= $value['id'] ?>">
                                            <?= $value['title'] ?>
                                        </label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <div class="form-group">
                        <?= Html::submitButton('Thêm mới', ['class' => 'btn btn-primary pull-right']) ?>

                    </div>
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
                                            <input type="checkbox" name="page[]" value="<?= $value->id ?>">
                                            <?= $value->title ?>
                                        </label>
                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <div class="form-group">
                        <?= Html::submitButton('Thêm mới', ['class' => 'btn btn-primary pull-right']) ?>

                    </div>
                </div>
            </div>

            <?= $form->field($model, 'id')->hiddenInput()->label(FALSE) ?>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2 style="margin-right:10px">Menu </h2>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <?= $model->name ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php
                            if (!empty($menuall)) {
                                foreach ($menuall as $value) {
                                    ?>
                                    <li><a href="<?= Yii::$app->urlManager->createUrl(["menu/view", 'id' => $value->id]) ?>"><?=$value->name?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="sortable" class="tree-menu">
                        <?php

                        function menu(&$data = [], $parent = 0) {
                            $category = MenuItem::find()->where(['parent_id' => $parent])->orderBy(['order' => SORT_ASC])->all();
                            echo'<ul id=' . $parent . '>';
                            foreach ($category as $key => $value) {
                                ?>
                                <li id="<?= $value->id ?>">
                                    <div class="menu-item" style="border: 1px solid #ccc; padding: 8px 10px; background: #F7F7F7"><?= $value->type_name ?></div>
                                    <input type="hidden" name="order[]" value="<?= $value->id ?>"> 
                                    <input type="hidden" id="parent-<?= $value->id ?>" name="parent[<?= $value->id ?>]" value="<?= $value->parent_id ?>"> 
                                    <?= menu($data, $value->id); ?>
                                </li>
                                <?php
                            }
                            echo '</ul>';
                        }

                        echo menu();
                        ?>
                        <div class="form-group">
                            <?= Html::submitButton('Cập nhật', ['id' => 'addMenu', 'class' => 'btn btn-primary pull-right']) ?>

                        </div>
                    </div>
<!--                    <input type="hidden" name="menuitem-order" id="menuitem-order">
                    <input type="hidden" name="menuitem-id" id="menuitem-id">
                    <input type="hidden" name="menuitem-parent_id" id="menuitem-parent_id" value="0">-->
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    <?= $this->registerJs('
        $(function(){
    $( "#sortable ul" ).sortable({
        connectWith: "#sortable ul",
        placeholder: "ui-state-highlight",
        distance: 5,
        update: function(event, ui){
            
            var newOrder = $(this).sortable("toArray").toString();
            var _parent = Number(ui.item[0].parentElement.id);
            var id_item = ui.item[0].id;
            if (!isNaN(_parent))
                id_parent = _parent;
//            $("#menuitem-order").val(newOrder);
//            $("#menuitem-id").val(id_item);
//            $("#menuitem-parent_id").val(id_parent);
            $("#parent-"+id_item).val(id_parent);
//            $("#result").html("Datos a enviar: order=" + newOrder + "&parent=" + id_parent + "&id=" + id_item)

//            $.ajax({
//                url: "/menu/order",
//                data: "order=" + newOrder + "&parent=" + id_parent + "&id=" + id_item,
//                type: "POST"
//            });
        }
    });
});
            ') ?>
    <?= $this->registerJs("$(document).on('click', '#addMenu', function (event){
        event.preventDefault();
    $.ajax({
        url: '" . Yii::$app->urlManager->createUrl(["menu/order"]) . "',
            type: 'post',
            data: $('form#formMenu').serialize(),
            success: function(data) {
            if(data){
//                    window.location.href = '/cong-viec/'+data.job_slug+'/'+data.job_id;
                }
            }
        });

});") ?>
    <style>
        .ui-state-highlight { border: 1px solid #ccc; background: #F7F7F7; padding: 10px 0; height: 35px }
        #sortable li { cursor: move; }
        .tree-menu label { font-weight: normal; }
        .tree-menu ul { min-height: 10px; margin: 0 auto; list-style-type: none; padding-top:15px}
        .tree-menu > ul { padding: 0;}
        .tree-menu li {margin-bottom: 5px; width: 350px }
    </style>