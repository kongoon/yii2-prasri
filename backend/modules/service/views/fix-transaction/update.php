<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FixTransaction */

$this->title = 'Update Fix Transaction: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fix Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fix-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

    <?php if (!empty($model->photo)) { ?>
        <div class="row">
            <?php foreach ($model->getPhoto() as $photo) { ?>
                <div class="col-md-3 text-center">
                    <?= Html::img(Yii::getAlias('@web') . '/' . $model->uploadFolder . '/' . $photo, ['class' => 'img-fluid']) ?><br />
                    <?=Html::a($photo, Yii::getAlias('@web').'/'.$model->uploadFolder.'/'.$photo, ['target' => '_blank'])?>
                    <div class=""></div>
                        <?= Html::a('<i class="fa fa-trash"></i>', ['delete-photo', 'photo' => $photo, 'id' => $model->id], ['class' => 'btn btn-sm btn-danger', 'data' => ['confirm' => 'แน่ใจนะว่าต้องการลบ?']]) ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>