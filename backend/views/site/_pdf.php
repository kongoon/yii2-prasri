<div>
    <h4><?= $model->supplyItem->name ?></h4>
</div>
<barcode code="<?= $model->supplyItem->name ?>" type="QR" class="barcode" size="1" error="M" disableborder="1" />