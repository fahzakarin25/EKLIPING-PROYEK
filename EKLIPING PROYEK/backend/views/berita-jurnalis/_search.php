<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\BeritaJurnalisSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="berita-jurnalis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'id_jurnalis') ?>
                </div>
                <div class="col-sm-6">
                    <?= $form->field($model, 'tanggal_publis') ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" style="padding-top: 25px">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Berita Jurnalis', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <!-- ?= $form->field($model, 'nilai_kontrak') ?> -->

    <!-- ?= $form->field($model, 'status') ?> -->

    <?php // echo $form->field($model, 'url_berita') ?>

    <?php ActiveForm::end(); ?>

</div>
