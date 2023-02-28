<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/** @var yii\web\View $this */
/** @var backend\models\BeritaOnlineSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="berita-online-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6">
                    <!-- ?= $form->field($model, 'judul_berita') ?> -->
                    <?= $form->field($model, 'tanggal_publis')->widget(DatePicker::className(),[
                                'name' => 'dp_1',
                                'type' => DatePicker::TYPE_INPUT,
                                'options' => ['placeholder' => '--Tanggal--'],
                                'pluginOptions' => [
                                    'autoclose'=>true,
                                    'format' => 'yyyy-mm-dd',
                                    'todayHighlight' => true
                                ]
                    ]) ?>
                </div>
                    <!-- ?= $form->field($model, 'url_berita') ?> -->
                <div class="col-sm-6">
                    <!-- ?= $form->field($model, 'tanggal_publis') ?> -->
                    <?php
                        $option = ['1' => 'Belum Terverifikasi', '2' => 'Sudah Terverifikasi'];
                        echo $form->field($model, 'status')->dropDownList($option, ['prompt' => '-- Pilih Status --']);
                    ?>

                    <?php // echo $form->field($model, 'media') ?>

                    <?php // echo $form->field($model, 'create_at') ?>

                    <?php // echo $form->field($model, 'update_at') ?>

                    <?php // echo $form->field($model, 'create_by') ?>

                    <?php // echo $form->field($model, 'update_by') ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" style="padding-top: 25px">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Cari', ['class' => 'btn btn-primary']) ?>
                <?php
                    $roleName = Yii::$app->user->identity->role->name;
                    if($roleName == 'Media' || $roleName == 'Admin') { //hanya menampilkan saat login sebagi media dan admin
                        echo $tambah = Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Berita Online', ['create'], ['class' => 'btn btn-success']);
                    }else{ //selain media dan admin tidak akan memunculkan apa-apa
                        $tambah = ' ' ;
                    }
                ?>
            </div>
        </div>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
