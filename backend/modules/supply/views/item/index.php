<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\supply\models\SupplyItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supply Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supply-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Supply Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'supply_item_type_id',
                'value' => function ($model) {
                    return $model->supplyItemType->name;
                }
            ],
            'name',
            'no',
            [
                'attribute' => 'is_ready',
                'value' => function ($model) {
                    $arr = [0 => 'ไม่ใช้งาน', 1 => 'ใช้งาน'];
                    return $arr[$model->is_ready];
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
