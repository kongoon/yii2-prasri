<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupplyItemType */

$this->title = 'เพิ่มประเภทครุภัณฑ์';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทครุภัณฑ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-item-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
