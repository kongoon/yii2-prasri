<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FixTransaction */

$this->title = 'Create Fix Transaction';
$this->params['breadcrumbs'][] = ['label' => 'Fix Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fix-transaction-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
