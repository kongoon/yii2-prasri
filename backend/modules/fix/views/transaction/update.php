<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FixTransaction */

$this->title = 'Update Fix Transaction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fix Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fix-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
