<?php
use frontend\themes\nikom\NikomAsset;
use frontend\widgets\Alert;
use common\models\User;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use xtetis\bootstrap4glyphicons\assets\GlyphiconAsset;

GlyphiconAsset::register($this);

NikomAsset::register($this);
$asset = Yii::$app->assetManager->getPublishedUrl('@frontend/themes/nikom/assets');
?>


<?php $this->beginPage() ?>

<!DOCTYPE html>
<html class="loading" lang="<?= Yii::$app->language ?>" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="HANUMANIT">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <link rel="apple-touch-icon" href="<?= $asset ?>/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?= $asset ?>/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i|Sarabun|Kanit:300"
          rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"/>

    <?php $this->head() ?>

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu horizontal-menu-padding 1-column   blank-page blank-page" data-open="click" data-menu="horizontal-menu" data-col="1-column">
<?php $this->beginBody() ?>
<!-- BEGIN: Content-->
<div class="app-content container center-layout mt-2">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <?= \diecoding\toastr\ToastrFlash::widget([
                'options' => [
                    "closeButton" => true,
                    "debug" => false,
                    "newestOnTop" => true,
                    "progressBar" => true,
                    "positionClass" => "toast-top-center",//toast-top-center
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
            <?=$content?>
        </div>
    </div>
</div>
<!-- END: Content-->

<?php $this->endBody() ?>
</body>
<!-- END: Body-->

</html>
<?php $this->endPage()?>