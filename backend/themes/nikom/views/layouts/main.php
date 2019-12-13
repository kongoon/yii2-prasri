<?php

use backend\themes\nikom\NikomAsset;
use common\widgets\Alert;
use common\models\User;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use xtetis\bootstrap4glyphicons\assets\GlyphiconAsset;

GlyphiconAsset::register($this);

NikomAsset::register($this);
$asset = Yii::$app->assetManager->getPublishedUrl('@backend/themes/nikom/assets');


?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="loading" lang="<?= Yii::$app->language ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="HANUMANIT Co., Ltd.">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <link rel="apple-touch-icon" href="<?= $asset ?>/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $asset ?>/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i|Sarabun|Kanit:300|Oswald" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" />

    <?php $this->head() ?>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    <?php $this->beginBody() ?>
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
                            <img class="brand-logo" alt="PATHOLOGY" src="<?= $asset ?>/app-assets/images/logo/stack-logo.png">
                            <h2 class="brand-text">PRASRI</h2>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="toggle-icon ft-toggle-right font-medium-3 grey" data-ticon="ft-toggle-right"></i>
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content">
                <div class="collapse navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav mr-auto float-left">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon ft-bell"></i>
                                <span class="badge badge-pill badge-danger badge-up"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0">
                                        <span class="grey darken-2">เข้าระบบล่าสุด</span>
                                        <span class="notification-tag badge badge-danger float-right m-0"></span>
                                    </h6>
                                </li>
                                <li class="scrollable-container media-list">
                                    <?php foreach (User::find()->where(['>=', 'last_login_at', (time() - 604800)])->all() as $user) { ?>
                                        <a href="javascript:void(0)">
                                            <div class="media">
                                                <div class="media-left align-self-center">
                                                    <?= Html::img($user->getPicture(), ['class' => 'img-responsive img-circle', 'width' => 40]) ?>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading"><?= $user->name ?></h6>
                                                    <small>
                                                        <time class="media-meta text-muted" datetime="<?= $user->last_login_at ?>"><?= $user->last_login_at ?>
                                                        </time>
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </li>

                            </ul>
                        </li>

                        <li class="dropdown dropdown-user nav-item">
                            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <span class="avatar avatar-online">
                                    <img src="<?= Yii::$app->user->identity->getPicture() ?>" alt="<?= Yii::$app->user->identity->name ?>"><i></i>
                                </span><span class="user-name"><?= Yii::$app->user->identity->name ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <?= Html::a('<i class="ft-user"></i> ข้อมูลส่วนตัว', ['/teacher/account/index'], ['class' => 'dropdown-item']) ?>

                                <div class="dropdown-divider"></div>
                                <?= Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        '<i class="ft-power"></i> ออกจากระบบ (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'dropdown-item']
                                    )
                                    . Html::endForm() ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <?= $this->render('_menu') ?>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-12 col-12 mb-2">
                    <h3 class="content-header-title mb-0"><?= $this->title ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <?= Breadcrumbs::widget([
                                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <?= \diecoding\toastr\ToastrFlash::widget([
                    'options' => [
                        "closeButton" => true,
                        "debug" => false,
                        "newestOnTop" => true,
                        "progressBar" => true,
                        "positionClass" => "toast-top-right", //toast-top-center
                        "preventDuplicates" => false,
                        "onclick" => null,
                        "showDuration" => "8000",
                        "hideDuration" => "1000",
                        "timeOut" => "10000",
                        "extendedTimeOut" => "1000",
                        "showEasing" => "swing",
                        "hideEasing" => "linear",
                        "showMethod" => "fadeIn",
                        "hideMethod" => "fadeOut"
                    ]
                ]) ?>
                <?= $content ?>
            </div>
            <!--content-body-->
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Copyright &copy; <?= date('Y') ?> <a class="text-bold-800 grey darken-2" href="https://hanumanit.co.th" target="_blank">บริษัท หนุมานไอที จำกัด</a></span><span class="float-md-right d-none d-lg-block"></span></p>
    </footer>
    <!-- END: Footer-->


    <?php $this->endBody() ?>
</body>
<!-- END: Body-->

</html>
<?php $this->endPage() ?>