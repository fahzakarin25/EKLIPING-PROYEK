<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Media;

/* @var $this yii\web\View */
/* @var $model backend\models\KwitansiSearch */
/* @var $form yii\widgets\ActiveForm */
$range = range(date('Y'), 2022);
?>

<div class="kwitansi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-sm-3">
            <?php
                $datamedia = (new Media)->getDataMedia();
                echo $form->field($model, 'id_media')->label('Media')->widget(Select2::classname(), [
                    'data' => $datamedia,
                    'language' => 'id',
                    'options' => ['placeholder' => '-- Pilih Media --', 'class' => 'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>
        </div>
        <div class="col-sm-2">
            <?php
                $bulan = [
                    '01'=>'Januari',
                    '02'=>'Februari',
                    '03' =>'Maret',
                    '04' => 'April',
                    '05' => 'Mei',
                    '06' => 'Juni',
                    '07' => 'Juli',
                    '08' => 'Agustus',
                    '09' => 'September',
                    '10' => 'Oktober',
                    '11' => 'November',
                    '12' => 'Desember',
                ];
                echo $form->field($model, 'bulan')->dropDownList($bulan,[
                    'prompt'=>'--Pilih Bulan--',
                    // 'onChange'=>'submit()'
                ]) 
            ?>
        </div>
        <div class="col-sm-2">
            <?= $form->field($model, 'tahun')->dropDownList(array_combine($range, $range)); ?>
        </div>
        <div class="col-sm-2">
            <?php
                $option = ['1' => 'Belum dicetak', '2' => 'Sudah dicetak'];
                    echo $form->field($model, 'status_cetak')->dropDownList($option, ['prompt' => '-- Pilih Status --']);
            ?>
        </div>
        <div class="col-sm-3">
            <div class="form-group" style="padding-top: 28px">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Cari', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data ', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php // echo $form->field($model, 'id_kwitansi') ?>

    <?php // echo $form->field($model, 'nilai_kontrak') ?>

    <?php // echo $form->field($model, 'jumlah_berita') ?>

    <?php // echo $form->field($model, 'minimal_berita') ?>

    <?php // echo $form->field($model, 'harga_perberita') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php ActiveForm::end(); ?>

</div>
