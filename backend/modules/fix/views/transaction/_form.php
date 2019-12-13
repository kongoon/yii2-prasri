<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model common\models\FixTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fix-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'supply_item_id')->textInput() ?>

    <?= $form->field($model, 'transaction_at')->textInput() ?>

    <?= $form->field($model, 'transaction_by')->textInput() ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'get_by')->textInput() ?>

    <?= $form->field($model, 'get_at')->textInput() ?>

    <?= $form->field($model, 'fix_by')->textInput() ?>

    <?= $form->field($model, 'fix_at')->textInput() ?>

    <?= $form->field($model, 'fix_status_id')->textInput() ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'finish_at')->widget(DateTimePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii:ss'
        ]
    ])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
