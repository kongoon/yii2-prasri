<?php

use miloschuman\highcharts\Highcharts;
/* @var $this yii\web\View */

$this->title = 'PraSri4.0';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-body">
        <?= Highcharts::widget([
            
            'options' => [
                /*'chart' => [
                    'type' => 'column'
                ],*/
                'title' => ['text' => 'จำนวนการแจ้งซ่อมปี '.date('Y')],
                'xAxis' => [
                    'categories' => ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.']
                ],
                'yAxis' => [
                    'title' => ['text' => 'จำนวนการแจ้งซ่อม']
                ],
                'series' => [
                    ['name' => 'จำนวนการแจ้งซ่อม', 'data' => $data,]
                ]
            ]
        ])?>
    </div>
</div>

<?php //var_dump($data)?>