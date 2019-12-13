<?php

use yii\helpers\Html;
use yii\widgets\Menu;

$menu = [];
$menu[] = ['label' => '<span>ภาพรวม</span>', 'options' => ['class' => 'navigation-header']];
$menu[] = ['label' => '<i class="fa fa-dashboard"></i> <span>แผงควบคุม</span>', 'url' => ['/site/index']];

// Register
if (Yii::$app->user->can('pms_register_surgical') ||
    Yii::$app->user->can('pms_register_cyto') ||
    Yii::$app->user->can('pms_register_staining')
    ) {
    $menu[] = ['label' => '<span>ลงทะเบียนสิ่งส่งตรวจ</span>', 'options' => ['class' => 'navigation-header']];
    $menu[] = ['label' => '<i class="fa fa-file-text"></i> <span>SURGICAL (SN)</span>', 'url' => ['/register/case/surgical'], 'visible' => Yii::$app->user->can('pms_register_surgical')];
    $menu[] = ['label' => '<i class="fa fa-file-text"></i> <span>PAP (PN)</span>', 'url' => ['/register/case/pap'], 'visible' => Yii::$app->user->can('pms_register_cyto')];
    $menu[] = ['label' => '<i class="fa fa-file-text"></i> <span>NonGyn (FN)</span>', 'url' => ['/register/case/non-gyn'], 'visible' => Yii::$app->user->can('pms_register_cyto')];
    $menu[] = ['label' => '<i class="fa fa-file-text"></i> <span>Special Staining (EX)</span>', 'url' => ['/register/case/staining'], 'visible' => Yii::$app->user->can('pms_register_staining')];
}
// Center
if (Yii::$app->user->can('center')) {
    $menu[] = ['label' => '<span>ศูนย์รับสิ่งส่งตรวจ</span>', 'options' => ['class' => 'navigation-header']];
    $menu[] = ['label' => '<i class="fa fa-files-o"></i> <span>รายการตรวจทั้งหมด</span>', 'url' => ['/register/center/case-all']];

    $menu[] = ['label' => '<span>ข้อมูล</span>', 'options' => ['class' => 'navigation-header']];
    $menu[] = ['label' => '<i class="fa fa-user-md"></i> <span>โรงพยาบาล</span>', 'url' => ['/register/hospital/index']];
}

// Administrator
if (Yii::$app->user->can('administrator')) {
    $menu[] = ['label' => '<span>ผู้ดูแลระบบ</span>', 'options' => ['class' => 'navigation-header']];
    $menu[] = ['label' => '<i class="fa fa-cogs"></i> <span>ตั้งค่าระบบ</span>', 'url' => ['/administrator/setting/index']];
    $menu[] = ['label' => '<i class="fa fa-users"></i> <span>ผู้ใช้งาน</span>', 'url' => ['/administrator/user/index'], 'items' => [
        ['label' => '<span>รายการผู้ใช้งาน</span>', 'url' => ['/administrator/user/index']],
        ['label' => '<span>เพิ่มผู้ใช้งาน</span>', 'url' => ['/administrator/user/create']],
        //['label' => '<span>เมนู</span>', 'url' => ['/administrator/menu/index']],
    ]];
    $menu[] = ['label' => '<i class="fa fa-lock"></i> <span>ควบคุมสิทธิ์การเข้าถึง</span>', 'url' => ['/admin/assignment/index'], 'items' => [
        ['label' => '<span>การกำหนด</span>', 'url' => ['/admin/assignment/index']],
        ['label' => '<span>บทบาท</span>', 'url' => ['/admin/role/index']],
        ['label' => '<span>สิทธิ์</span>', 'url' => ['/admin/permission/index']],
        ['label' => '<span>เส้นทาง</span>', 'url' => ['/admin/route/index']],
    ]];

}//user can administrator


?>
<?= Menu::widget([
    'encodeLabels' => false,
    'options' => [
        'id' => 'main-menu-navigation',
        'class' => 'navigation navigation-main',
        'data' => [
                'menu' => 'navigation'
        ]
    ],
    'activateParents' => true,
    //'submenuTemplate' => "\n<div class=\" has-sub\">\n\t<ul>\n\t\t{items}\n\t</ul>\n</div>\n",
    'items' => $menu,
]) ?>
<div style="padding: 10px;">
    <?= Html::beginForm(['/site/logout'], 'post')
    . Html::submitButton(
        '<i class="glyph-icon icon-power-off"></i><span> ออกจากระบบ (' . Yii::$app->user->identity->username . ')',
        ['class' => 'btn btn-block btn-danger logout']
    )
    . Html::endForm() ?>
</div>
