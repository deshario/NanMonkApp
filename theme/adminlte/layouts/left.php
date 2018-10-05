<?php

use yii\helpers\Html;
use app\models\User;
use yii\bootstrap\Modal;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->

        <?php if (Yii::$app->user->isGuest) { ?>

            <?php

            $menuItems = [
                ['label' => 'Menu', 'options' => ['class' => 'header']],
                ['label' => 'เข้าสู่ระบบ', 'icon' => 'sign-in', 'url' => ['site/login']],
            ];

            ?>

        <?php } else { ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::getAlias('@web').'/img/mm.png'; ?>" class="img-circle" alt="User Image"/>
                </div>
                <div class="pull-left info">

                    <p><?= Yii::$app->user->identity->username ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์ </a>
                </div>
            </div>

            <?php
            $Maccess = Yii::$app->user->identity->roles;
            if ($Maccess == User::ROLE_ADMIN) {
                $menuItems = [
                    ['label' => '', 'options' => ['class' => 'header']],
                    ['label' => 'ตำแหน่ง', 'icon' => 'arrow-right', 'url' => ['position/index'],],
                    ['label' => 'ที่อยู่', 'icon' => 'arrow-right', 'url' => ['address/index'],],
                    ['label' => 'ระดับการศึกษา', 'icon' => 'arrow-right', 'url' => ['education-level/index'],],
                    ['label' => 'ลำดับสมณศักดิ์', 'icon' => 'arrow-right', 'url' => ['samanasak-level/index'],],
                    [
                        'label' => 'พืนที่ทั้งหมด',
                        'icon' => 'key',
                        'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'ตำบล', 'icon' => 'arrow-right', 'url' => ['tambol/index'],],
                            ['label' => 'อำเภอ', 'icon' => 'arrow-right', 'url' => ['amphur/index'],],
                            ['label' => 'จังหวัด', 'icon' => 'arrow-right', 'url' => ['province/index'],],
                            ['label' => 'รหัสไปรษณีย์', 'icon' => 'arrow-right', 'url' => ['zipcode/index'],],
                        ],
                    ],
                    ['label' => 'ออกจากระบบ', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }else{
                $menuItems = [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'ข้อมูลปัจจุบัน', 'icon' => 'arrow-right', 'url' => ['/current-data/index']],
                    ['label' => 'การบรรพชา', 'icon' => 'arrow-right', 'url' => ['/banpacha-data/index']],
                    ['label' => 'การอุปสมบท', 'icon' => 'arrow-right', 'url' => ['/woopasombod/index']],
                    ['label' => 'การจำพรรษา', 'icon' => 'arrow-right', 'url' => ['/champhansa/index']],
                    ['label' => 'ลำดับสมณศักดิ์', 'icon' => 'arrow-right', 'url' => ['/samanasak/index']],
                    ['label' => 'ตำแหน่งทางคณะสงฆ์', 'icon' => 'arrow-right', 'url' => ['/rank/index']],
                    ['label' => 'การศึกษา', 'icon' => 'arrow-right', 'url' => ['/education/index']],
                    ['label' => 'การอบรม', 'icon' => 'arrow-right', 'url' => ['/training/index']],
                    ['label' => 'ความสามารถพิเศษ', 'icon' => 'arrow-right', 'url' => ['/talent/index']],
                    ['label' => 'ผลงาน', 'icon' => 'arrow-right', 'url' => ['/portfolio/index']],
                    ['label' => 'ออกจากระบบ', 'icon' => 'sign-out', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }
            ?>

        <?php } ?>




        <?= dmstr\widgets\Menu::widget([
            'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
            'items' => $menuItems
        ]); ?>

    </section>

</aside>
