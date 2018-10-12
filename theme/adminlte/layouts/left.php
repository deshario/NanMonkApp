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
                    ['label' => 'ความสามารถพิเศษ', 'icon' => 'arrow-right', 'url' => ['hobby/index'],],
                    ['label' => 'ประเภทผลงาน', 'icon' => 'arrow-right', 'url' => ['specialwork/index'],],
                    //['label' => 'ที่อยู่', 'icon' => 'arrow-right', 'url' => ['address/index'],],
                    ['label' => 'สัญชาติ', 'icon' => 'arrow-right', 'url' => ['nationality/index'],],
                    ['label' => 'หลักสูตรอบรม', 'icon' => 'arrow-right', 'url' => ['training/index'],],
                    ['label' => 'ตำแหน่ง', 'icon' => 'arrow-right', 'url' => ['position/index'],],
                    ['label' => 'สมณศักดิ์', 'icon' => 'arrow-right', 'url' => ['promotion/index'],],
                    [
                        'label' => 'ระดับการศึกษา',
                        'icon' => 'key',
                        'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'ระดับการศึกษาทางโลก', 'icon' => 'arrow-right', 'url' => ['education-standard/index'],],
                            ['label' => 'ระดับการศึกษาทางธรรม', 'icon' => 'arrow-right', 'url' => ['education-dhamma/index'],],
                        ],
                    ],
                    ['label' => 'ออกจากระบบ', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }else{
                $menuItems = [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    [
                        'label' => 'ข้อมูลพืนฐาน',
                        'icon' => 'key',
                        //'active' => true,
                        'url' => '#',
                        'items' => [
                            ['label' => 'person-master', 'icon' => 'arrow-right', 'url' => ['person-master/index'],],
                            ['label' => 'monkhood-master', 'icon' => 'arrow-right', 'url' => ['monkhood-master/index'],],
                        ],
                    ],
                    ['label' => 'การย้ายสังกัด', 'icon' => 'arrow-right', 'url' => ['movetemple-trans/index'],],
                    ['label' => 'การจำพรรษา', 'icon' => 'arrow-right', 'url' => ['staytemple-trans/index'],],
                    [
                        'label' => 'ประวัติการศึกษา',
                        'icon' => 'key',
                        'url' => '#',
                        'items' => [
                            ['label' => 'education-trans', 'icon' => 'arrow-right', 'url' => ['education-trans/index'],],
                            ['label' => 'education-temp-trans', 'icon' => 'arrow-right', 'url' => ['education-temp-trans/index'],],
                        ],
                    ],

                    ['label' => 'ตำแหน่งทางคณะสงฆ์', 'icon' => 'arrow-right', 'url' => ['position-trans/index'],],
                    ['label' => 'ลำดับสมณศักดิ์', 'icon' => 'arrow-right', 'url' => ['promotion-trans/index'],],
                    ['label' => 'การอบรม', 'icon' => 'arrow-right', 'url' => ['training-trans/index'],],
                    ['label' => 'ความสามมารถพิเศษ', 'icon' => 'arrow-right', 'url' => ['hobby-trans/index'],],
                    ['label' => 'ผลงานสำคัญ', 'icon' => 'arrow-right', 'url' => ['specialwork-trans/index'],],
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
