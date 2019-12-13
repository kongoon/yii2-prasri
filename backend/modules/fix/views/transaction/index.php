<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\fix\models\FixTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fix Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fix-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fix Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'supply_item_id',
                'value' => function ($model) {
                    return $model->supplyItem->no . '-' . $model->supplyItem->name;
                }
            ],
            'transaction_at:datetime',
            [
                'attribute' => 'transaction_by',
                'value' => function ($model) {
                    return $model->transactionBy->name;
                }
            ],
            'detail:ntext',
            //'result:ntext',
            //'get_by',
            //'get_at',
            //'fix_by',
            //'fix_at',
            //'fix_status_id',
            //'remark:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>