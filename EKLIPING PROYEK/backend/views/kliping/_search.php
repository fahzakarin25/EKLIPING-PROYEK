<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use backend\models\KategoriKliping;
use backend\models\Media;

/** @var yii\web\View $this */
/** @var backend\models\KlipingSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kliping-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-sm-4">
                    <!-- ?= $form->field($model, 'tanggal') ?> -->
                    <?= $form->field($model, 'tanggal')->widget(DatePicker::className(),[
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
                <div class="col-sm-4">
                    <!-- ?= $form->field($model, 'kategori') ?> -->
                    <?php
                        $datakliping = (new KategoriKliping)->getDataKliping();
                        echo $form->field($model, 'kategori')->label('Kategori Kliping')->widget(Select2::classname(), [
                            'data' => $datakliping,
                            'language' => 'id',
                            'options' => ['placeholder' => '-- Pilih Kategori --','class'=>'form-control'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                    ?>
                </div>
                <div class="col-sm-3">
                    <!-- ?= $form->field($model, 'media') ?> -->
                    <?php
                        $datamedia = (new Media)->getDataMedia();
                        echo $form->field($model, 'media')->label('Media')->widget(Select2::classname(), [
                            'data' => $datamedia,
                            'language' => 'id',
                            'options' => ['placeholder' => '-- Pilih Media --', 'class' => 'form-control'],
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
                <?= Html::a('<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Kliping', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

            <?php // echo $form->field($model, 'jurnalis') ?>

            <?php // echo $form->field($model, 'lokasi_upload') ?>

            <?php // echo $form->field($model, 'status_publis') ?>

            <?php // echo $form->field($model, 'create_time') ?>

            <?php // echo $form->field($model, 'update_time') ?>

            <?php // echo $form->field($model, 'create_by') ?>

            <?php // echo $form->field($model, 'update_by') ?>

    <?php ActiveForm::end(); ?>

</div>
