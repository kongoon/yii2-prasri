<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
        ];
        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        } else {
            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';
        }
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);
        NavBar::end();
        ?>

        <div class="container-fluid">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>

            <div class="row">
                <div class="col-md-3 mymenu">

                    <?php
                    $items = [
                        ['label' => 'หน้าหลัก', 'url' => Yii::$app->homeUrl]
                    ];

                    // Supply
                    $items[] = '<li><h4 class="text-center">งานครุภัณฑ์</h4></li>';
                    $items[] = ['label' => 'ประเภทครุภัณฑ์', 'url' => ['/supply/item-type/index']];
                    $items[] = ['label' => 'ครุภัณฑ์', 'url' => ['/supply/item/index']];

                    // Fix
                    $items[] = '<li><h4 class="text-center">งานแจ้งซ่อม</h4></li>';
                    $items[] = ['label' => 'รายการแจ้งซ่อม', 'url' => ['/fix/transaction/index']];
                    $items[] = ['label' => 'สถานะการแจ้งซ่อม', 'url' => ['/fix/status/index'], 'items' => [
                        ['label' => 'รายการสถานะ', 'url' => ['/fix/status/index']],
                        ['label' => 'เพิ่มสถานะ', 'url' => ['/fix/status/create']],
                    ]];

                    // Service
                    $items[] = '<li><h4 class="text-center">บริการ</h4></li>';
                    $items[] = ['label' => 'แจ้งซ่อม', 'url' => ['/service/fix-transaction/index']];
                    ?>
                    <?=Nav::widget([
                        'items' => $items,
                        'options' => ['class' => 'nav-pills nav-stacked'],
                    ])?>

                </div>
                <div class="col-md-9">
                    <?= $content ?>
                </div>
            </div>


        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>