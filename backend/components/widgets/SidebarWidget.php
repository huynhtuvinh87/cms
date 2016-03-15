<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace backend\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\db\Query;
use yii\widgets\Menu;
use common\models\User;

class SidebarWidget extends Widget {

    public function init() {
        
    }

    public function run() {
        if (!Yii::$app->user->isGuest) {
            ?>
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;padding:15px 10px 15px 0;">
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>" class="site_title">
                        GIICMS
                    </a>
                    <a href="http://<?= $_SERVER['HTTP_HOST'] ?>" class="site_title site_title_sm">
                        GIICMS
                    </a>
                </div>
                <div class="clearfix"></div>


                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section ">
                        <?php
                        echo Menu::widget([
                            'items' => [
                                ['label' => '<i class="fa fa-tachometer"></i> Trang chủ', 'url' => ['site/index']],
                                ['label' => '<i class="fa fa-question-circle"></i> Quản lý bài viết<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                        ['label' => 'Danh mục', 'url' => ['category/index']],
                                        ['label' => 'Thêm mới danh mục', 'url' => ['category/create']],
                                        ['label' => 'Danh sách', 'url' => ['post/index']],
                                        ['label' => 'Thêm mới', 'url' => ['post/create']],
                                    ],
                                ],
                                ['label' => '<i class="fa fa-thumb-tack"></i> Quản lý trang<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                        ['label' => 'Danh sách', 'url' => ['page/index']],
                                        ['label' => 'Thêm mới', 'url' => ['page/create']],
                                    ],
                                ],
                                ['label' => '<i class="fa fa-question-circle"></i> Quản lý sản phẩm<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                        ['label' => 'Danh mục', 'url' => ['productcategory/index']],
                                        ['label' => 'Thêm mới danh mục', 'url' => ['productcategory/create']],
                                        ['label' => 'Danh sách', 'url' => ['product/index']],
                                        ['label' => 'Thêm mới', 'url' => ['product/create']],
                                    ],
                                ],
                                ['label' => '<i class="fa fa-picture-o"></i> Quản lý đơn hàng', 'url' => ['order/index']],
                                ['label' => '<i class="fa fa-picture-o"></i> Quản lý menu', 'url' => ['menu/index']],
                                ['label' => '<i class="fa fa-picture-o"></i> Quản lý file', 'url' => ['file/index']],
                                ['label' => '<i class="fa fa-question-circle"></i> Phân quyền<span class="fa fa-chevron-down"></span>', 'url' => 'javascript:void(0)', 'items' => [
                                        ['label' => 'Roles', 'url' => ['role/index']],
                                        ['label' => 'Permissions', 'url' => ['permission/index']],
                                        ['label' => 'Routes', 'url' => ['route/index']],
                                    ],
                                ],
                                ['label' => '<i class="fa fa-cog"></i> Cấu hình chung', 'url' => ['setting/index']],
                            ],
                            'encodeLabels' => false,
                            'submenuTemplate' => "\n<ul class='nav child_menu' style='display: none'>\n{items}\n</ul>\n",
                            'options' => array('class' => 'side-menu nav')
                        ]);
                        ?>

                    </div>


                </div>

            </div>
            <?php
        }
    }

}
