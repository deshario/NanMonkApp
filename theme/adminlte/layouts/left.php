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
                    <?php
                    $id = Yii::$app->user->identity->id;
                    $model = \app\models\PersonMaster::find()->where('user_id = ' . $id)->one();
                    if($model != null){
                        $imgdir = Yii::getAlias('@web').'/uploads/avatars/';
                        $img = $imgdir.$model->person_pic;
                    }else{
                        $imgdir = Yii::getAlias('@web').'/img/';
                        $img = $imgdir.'mm.png';
                    }
                    ?>
                    <img src="<?php echo $img; ?>" class="img-circle" alt="User Image"/>
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
                        'url' => '#',
                        'items' => [
                            ['label' => 'ระดับการศึกษาทางโลก', 'icon' => 'arrow-book', 'url' => ['education-standard/index'],],
                            ['label' => 'ระดับการศึกษาทางธรรม', 'icon' => 'arrow-right', 'url' => ['education-dhamma/index'],],
                        ],
                    ],
                    [
                        'label' => 'ผู้ใช้งาน',
                        'icon' => 'users',
                        'url' => '#',
                        'active' => true,
                        'items' => [
                            ['label' => 'สร้างผู้ใช้งาน', 'icon' => 'plus', 'url' => ['user/create'],],
                            ['label' => 'จัดการผู้ใช้งาน', 'icon' => 'edit', 'url' => ['user/manage'] ],
                        ],
                    ],
                    ['label' => 'ออกจากระบบ', 'url' => ['site/logout'], 'template' => '<a href="{url}" data-method="post"><i class="fa fa-sign-out"></i>{label}</a>'],
                ];
            }else{
                $menuItems = [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'ข้อมูลพืนฐาน', 'icon' => 'info-circle', 'url' => ['person-master/index'],],
                    ['label' => 'การย้ายสังกัด', 'icon' => 'arrows', 'url' => ['movetemple-trans/index'],],
                    ['label' => 'การจำพรรษา', 'icon' => 'building-o', 'url' => ['staytemple-trans/index'],],
                    [
                        'label' => 'ประวัติการศึกษา',
                        'icon' => 'book',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ทางโลก', 'icon' => 'arrow-right', 'url' => ['education-trans/index'],],
                            ['label' => 'ทางธรรม', 'icon' => 'arrow-right', 'url' => ['education-temp-trans/index'],],
                        ],
                    ],

                    ['label' => 'ตำแหน่งทางคณะสงฆ์', 'icon' => 'product-hunt', 'url' => ['position-trans/index'],],
                    ['label' => 'ลำดับสมณศักดิ์', 'icon' => 'product-hunt', 'url' => ['promotion-trans/index'],],
                    ['label' => 'การอบรม', 'icon' => 'bandcamp', 'url' => ['training-trans/index'],],
                    ['label' => 'ความสามมารถพิเศษ', 'icon' => 'list', 'url' => ['hobby-trans/index'],],
                    ['label' => 'ผลงานสำคัญ', 'icon' => 'product-hunt', 'url' => ['specialwork-trans/index'],],
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
