<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Media;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var backend\models\JurnalisSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jurnalis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-6">
                    <!-- ?= $form->field($model, 'id_pers') ?> -->
                    <?= $form->field($model, 'nama_jurnalis') ?>
                </div>
                <div class="col-sm-6">
                    <!-- ?php echo $form->field($model, 'media_jurnalis') ?> -->
                    <?php
                        $datamedia = (new Media)->getDataMedia();
                        echo $form->field($model, 'media_jurnalis')->label('Media')->widget(Select2::classname(), [
                            'data' => $datamedia,
                            'language' => 'id',
                            'options' => ['placeholder' => '-- Pilih Media --','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?> 
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group" style="padding-top: 25px">
                <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i> Cari', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Jurnalis', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
    
    <!-- ?= $form->field($model, 'tempat_lahir') ?> -->
    <!-- ?= $form->field($model, 'tanggal_lahir') ?> -->
    <!-- ?= $form->field($model, 'alamat') ?> -->
    <?php // echo $form->field($model, 'jabatan') ?>
    <?php // echo $form->field($model, 'hp_wa') ?>

    <?php // echo $form->field($model, 'wilayah') ?>

    <?php ActiveForm::end(); ?>

</div>
