<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use backend\components\widgets\SidebarWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <!-- Bootstrap core CSS -->
        <!--
                <link href="/css/bootstrap.min.css" rel="stylesheet">
        
                <link href="/fonts/css/font-awesome.min.css" rel="stylesheet">
                <link href="/css/animate.min.css" rel="stylesheet">
                <link href="/css/custom.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="/css/maps/jquery-jvectormap-2.0.1.css" />
                <link href="/css/icheck/flat/green.css" rel="stylesheet" />
                <link href="/css/floatexamples.css" rel="stylesheet" type="text/css" />-->


        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <body class="nav-md" style="">
        <?php $this->beginBody() ?>
        <div class="container body">


            <div class="main_container">

                <div class="col-md-3 left_col">
                    <?= SidebarWidget::widget() ?>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <?php if (!Yii::$app->user->isGuest) { ?>
                                        <a href="javascript:void(0)" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                            <img src="<?= Yii::$app->user->identity->username ?>" alt=""><?= Yii::$app->user->identity->username ?>
                                            <span class=" fa fa-angle-down"></span>
                                        </a>
                                    <?php } ?>
                                    <?php
                                    echo Menu::widget([
                                        'encodeLabels' => false,
                                        'items' => [
                                            ['label' => 'Thông tin cá nhân', 'url' => ['account/profile']],
                                            ['label' => '<i class="fa fa-sign-out pull-right"></i>  Thoát', 'url' => ['site/logout']],
                                        ],
                                        'options' => [
                                            'class' => 'dropdown-menu dropdown-usermenu animated fadeInDown pull-right',
                                        ],
                                    ]);
                                    ?>
                                </li>

                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->


                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="pull-right">
                        <?=
                        Breadcrumbs::widget([
                            'homeLink' => [
                                'label' => Yii::t('yii', 'Dashboard'),
                                'url' => Yii::$app->homeUrl,
                            ],
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                    </div>
                    <!-- top tiles -->
                    <?= $content ?>
                    <!-- footer content -->

                    <!--                    <footer>
                                            <div class="">
                                                <p class="pull-right">
                                                    <span class="lead"> <i class="fa fa-paw"></i> Giao nhận việc</span>
                                                </p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </footer>-->
                    <!-- /footer content -->
                </div>
                <!-- /page content -->

            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>


        <?php $this->endBody() ?>
    </body>

</html>
<?php $this->endPage() ?>