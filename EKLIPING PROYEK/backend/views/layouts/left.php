<?php

use yii\bootstrap4\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <center>
            <?= Html::img('@root/images/eklipingwhite.png',['class' =>'img-circle evaluation-2','style' =>'width: 25; height: 50px']); ?>
            </center>
            <hr>
            <div class="pull-left image">
                <?= Html::img('@root/img/pariaman.png',['class' =>'img-circle evaluation-2','alt' =>'User Image']); ?>
            </div>
            <div class="pull-left info" style="padding-top: 25px">
                <p><?= $roleName = Yii::$app->user->isGuest== false ? Yii::$app->user->identity->profile->full_name: ''; ?></p>
            </div>
        </div>
        <hr>

        <?php
        $roleName = Yii::$app->user->isGuest== false ? Yii::$app->user->identity->role->name: '';//untuk mendapatkan role name

        if  (Yii::$app->user->isGuest==false && $roleName=='Admin'){
            $menu = [
                [
                    'label' => 'Dashboard',
                    'url' => ['/site'], "icon" => "dashboard",
                ],
                [
                    'label' => 'Data Kliping',
                    'url' => ['/kliping'], "icon" => "fa-fw fa-clone",
                ],
                [
                    'label' => 'Kategori Kliping',
                    'url' =>  ['/kategori-kliping'], "icon" => "fa-fw fa-th-list"
                ],
                [
                    'label' => 'Data Jurnalis',
                    'url' => ['/jurnalis'], "icon" => "fa-fw fa-users",
                ],
                [
                    'label' => 'Data Media',
                    'url' => ['/media'], "icon" => "fa-fw fa-newspaper-o",
                ],
                [
                    'label' => 'Profile User',
                    'url' => ['/user/profile'], "icon" => "fa-fw fa-user"
                ],
                [
                    'label' => 'User Admin',
                    'url' => ['/user/admin'], "icon" => "fa-fw fa-user",
                ],
            ];
        }
        elseif (Yii::$app->User->isGuest==false && $roleName=='Media'){
            $menu = [
                [
                    'label' => 'Dashboard',
                    'url' => ['/site/index-media'], "icon" => "fas fa-home",
                ],
                [
                    'label' => 'Berita Online',
                    'url' => ['/berita-online'], "icon" => "fa-fw fa-newspaper-o",
                ],
                [
                    'label' => 'Kwitansi/SPJ',
                    'url' => ['/kwitansi'], "icon" => "money",
                ],
            ];
        }
        elseif (Yii::$app->User->isGuest==false && $roleName=='Verifikator'){
            $menu = [
                [
                    'label' => 'Dashboard',
                    'url' => ['site/index-verifikasi'], "icon" => "fas fa-home",
                ],
                [
                    'label' => 'Berita Online',
                    'url' => ['/berita-online'], "icon" => "fa-fw fa-newspaper-o",
                ],
            ];
        }
        else {
            $menu=[];
        }
        ?>

        <?=  dmstr\widgets\Menu::widget([
            "items" =>  $menu
        ]) ?>

    </section>

</aside>
