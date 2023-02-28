<?php

use backend\models\Jurnalis;
use backend\models\KategoriKliping;
use backend\models\Media;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use kartik\file\FileInput;

/** @var yii\web\View $this */
/** @var backend\models\Kliping $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="kliping-form ">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
                <?= $form->field($model, 'judul')->textInput(['maxlength' => true]) ?>
                <!-- ?= $form->field($model, 'media')->textInput(['maxlength' => true]) ?> -->
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
                <?php
                $datakliping = (new KategoriKliping)->getDataKliping();
                echo $form->field($model, 'kategori')->label('Kategori Kliping')->widget(Select2::classname(), [
                    'data' => $datakliping,
                    'language' => 'id',
                    'options' => ['placeholder' => '-- Pilih Kategori --', 'class' => 'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
                <?= $form->field($model, 'tanggal')->widget(DatePicker::className(), [
                    'name' => 'dp_1',
                    'type' => DatePicker::TYPE_INPUT,
                    'options' => ['placeholder' => '--Tanggal--'],
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]) ?>
                <?php
                $datajurnal = (new Jurnalis)->getDataJurnalis();
                echo $form->field($model, 'jurnalis')->label('Jurnalis')->widget(Select2::classname(), [
                    'data' => $datajurnal,
                    'language' => 'id',
                    'options' => ['placeholder' => '-- Pilih Jurnalis --', 'class' => 'form-control'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
                <!-- ?= $form->field($model, 'status_publis')->textInput() ?> -->
                <?php
                $option = ['1' => 'Ditampilkan', '2' => 'Tidak Ditampilkan'];
                echo $form->field($model, 'status_publis')->dropDownList($option, ['prompt' => '-- Pilih Status --']);
                ?>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <!-- ?= $form->field($model, 'lokasi_upload')->textInput(['maxlength' => true]) ?> -->
                    <?= $form->field($model, 'upload_file')->widget(FileInput::classname(), [
                        'options' => [
                            'accept' => 'image/*',
                        ],
                        'pluginOptions' => [
                            'browseOnZoneClick' => true,
                        ]
                    ])->label('Upload File PDF');
                    ?>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php ActiveForm::end(); ?>
</div>