<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\service\models\FixTransactionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fix Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fix-transaction-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Fix Transaction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'supply_item_id',
            'transaction_at',
            'transaction_by',
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
