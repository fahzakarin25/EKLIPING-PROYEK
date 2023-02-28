<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\KategoriKliping $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kategori-kliping-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div>
                    <div class="box-body">
                        <!-- ?= $form->field($model, 'id_kategori')->textInput() ?> -->

                        <?= $form->field($model, 'jenis_kategori')->textInput(['maxlength' => true]) ?>
                        <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
