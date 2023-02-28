<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\KategoriKlipingSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kategori-kliping-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <!-- ?= $form->field($model, 'id_kategori') ?> -->
            <?= $form->field($model, 'jenis_kategori') ?>
        </div>
        <div class="form-group" style="padding-top: 25px">
            <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Cari', ['class' => 'btn btn-primary']) ?>
            <?= Html::a(' <i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Kategori Kliping', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
