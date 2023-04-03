<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Media $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="media-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
                <div class="box-body">
                    <!-- ?= $form->field($model, 'id_kategori')->textInput() ?> -->

                    <?= $form->field($model, 'nama_media')->textInput() ?>

                    <?= $form->field($model, 'jenis_media')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'nilai_kontrak')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'minimal_berita')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'harga_perberita')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
