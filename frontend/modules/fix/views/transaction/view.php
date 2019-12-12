<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FixTransaction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fix Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fix-transaction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'supply_item_id',
            'transaction_at',
            'transaction_by',
            'detail:ntext',
            'result:ntext',
            'get_by',
            'get_at',
            'fix_by',
            'fix_at',
            'fix_status_id',
            'remark:ntext',
        ],
    ]) ?>

</div>
