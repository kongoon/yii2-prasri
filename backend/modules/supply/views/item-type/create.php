<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupplyItemType */

$this->title = 'เพิ่มประเภทครุภัณฑ์';
$this->params['breadcrumbs'][] = ['label' => 'ประเภทครุภัณฑ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
