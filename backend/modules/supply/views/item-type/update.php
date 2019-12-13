<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupplyItemType */

$this->title = 'แก้ไข: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'ประเภทครุภัณฑ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="supply-item-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
