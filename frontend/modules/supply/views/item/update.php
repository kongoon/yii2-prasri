<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupplyItem */

$this->title = 'Update Supply Item: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Supply Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="supply-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
