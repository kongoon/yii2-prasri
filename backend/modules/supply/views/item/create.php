<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SupplyItem */

$this->title = 'Create Supply Item';
$this->params['breadcrumbs'][] = ['label' => 'Supply Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
