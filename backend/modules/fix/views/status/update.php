<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FixStatus */

$this->title = 'Update Fix Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fix Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fix-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
