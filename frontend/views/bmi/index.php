<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'height')?>

<?=$form->field($model, 'weight')?>

<?=Html::submitButton('คำนวณ', ['class' => 'btn btn-success'])?>

<?php ActiveForm::end()?>

<?=$bmi?>

<?php Yii::$app->db->open()?>