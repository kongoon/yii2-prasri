<?php

use common\models\SupplyItem;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FixTransaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fix-transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'supply_item_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(SupplyItem::find()->all(), 'id', function($model){
            return $model->no.' '.$model->name;
        }),
        'theme' => Select2::THEME_BOOTSTRAP,
        'pluginOptions' => [
            'placeholder' => 'เลือกครุภัณฑ์...'
        ]
    ]) ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

    
    <div class="form-group">
        <?= Html::submitButton('แจ้งซ่อม', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
