<?php

use backend\models\Jurnalis;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var backend\models\BeritaJurnalis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="berita-jurnalis-form">
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(); ?>
            <?php
                $datajurnal = (new Jurnalis)->getDataJurnalis(); //getdatajurnalis = controllers
                echo $form->field($model, 'id_jurnalis')->label('Nama Jurnalis')->widget(Select2::classname(), [ //field id_jurnalis
                    'data' => $datajurnal,
                    'language' => 'id',
                    'options' => ['placeholder' => '-- Pilih Jurnalis --', 'class' => 'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
            ?>

            <?= $form->field($model, 'nilai_kontrak')->textInput() ?>

            <?= $form->field($model, 'tanggal_publis')->widget(DatePicker::className(), [
                    'name' => 'dp_1',
                    'type' => DatePicker::TYPE_INPUT,
                    'options' => ['placeholder' => '--Tanggal Publis--'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
            ]) ?>
            <?php
            $option = ['1' => 'Ditampilkan', '2' => 'Tidak Ditampilkan'];
            echo $form->field($model, 'status')->dropDownList($option, ['prompt' => '-- Pilih Status --']);
            ?>
            <?= $form->field($model, 'url_berita')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
