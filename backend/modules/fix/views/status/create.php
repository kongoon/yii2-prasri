<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FixStatus */

$this->title = 'Create Fix Status';
$this->params['breadcrumbs'][] = ['label' => 'Fix Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fix-status-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
