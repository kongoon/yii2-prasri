<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\SupplyItemType;

/* @var $this yii\web\View */
/* @var $model common\models\SupplyItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supply-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model)?>

    <?= $form->field($model, 'supply_item_type_id')->dropDownList(ArrayHelper::map(SupplyItemType::find()->all(), 'id', 'name'), ['prompt' => 'เลือกประเภทครุภัณฑ์']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_ready')->radioList([0 => 'ไม่ใช้งาน', 1 => 'ใช้งาน'])?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
