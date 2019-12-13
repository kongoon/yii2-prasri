<?php

use frontend\themes\nikom\NikomAsset;
use yii\helpers\Html;

NikomAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <style>
            body{
                margin-top:100px;
            }
        </style>
    </head>
    <?php $this->beginBody() ?>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                <div class="card">

                    <div class="card-body">
                        <div class="text-center">
                            <?= Html::img(Yii::getAlias('@web') . '/images/logo.jpg', ['alt' => 'PROLAB']) ?>

                         <?= $content; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-6"><?= Html::a('กลับ', isset(Yii::$app->request->referrer) ? Yii::$app->request->referrer : Yii::$app->homeUrl, ['class' => 'btn btn-success btn-block']) ?></div>
                            <div class="col-md-6"><?= Html::a('กลับหน้าหลัก', Yii::$app->homeUrl, ['class' => 'btn btn-info btn-block']) ?></div>

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end .row -->
        <div class="row">
            <div class="col-md-12 text-center">
                <small>
                    บริษัท โปรแลป
                    <br />&copy;2019-<?=date('Y')?> All rights reserved.</small>
            </div>
        </div>
    </div><!-- end .container -->
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>