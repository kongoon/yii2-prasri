<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\fix\models\FixTransactionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fix-transaction-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'supply_item_id') ?>

    <?= $form->field($model, 'transaction_at') ?>

    <?= $form->field($model, 'transaction_by') ?>

    <?= $form->field($model, 'detail') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'get_by') ?>

    <?php // echo $form->field($model, 'get_at') ?>

    <?php // echo $form->field($model, 'fix_by') ?>

    <?php // echo $form->field($model, 'fix_at') ?>

    <?php // echo $form->field($model, 'fix_status_id') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
