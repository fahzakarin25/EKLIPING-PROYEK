<?php

use backend\models\Media;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var backend\models\Jurnalis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jurnalis-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                </div>
                <div class="box-body"> 
                    <div class="col-md-6">
                        <?= $form->field($model, 'id_pers')->textInput() ?>
                        <?= $form->field($model, 'nama_jurnalis')->textInput(['maxlength' => true]) ?>
                        <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>
                        <!-- ?= $form->field($model, 'tanggal_lahir')->textInput() ?> -->
                        <?= $form->field($model, 'tanggal_lahir')->widget(DatePicker::className(),[
                                    'name' => 'dp_1',
                                    'type' => DatePicker::TYPE_INPUT,
                                    'options' => ['placeholder' => '--Tanggal Lahir--'],
                                    'pluginOptions' => [
                                        'autoclose'=>true,
                                        'format' => 'yyyy-mm-dd',
                                        'todayHighlight' => true
                                    ]
                        ]) ?>
                        <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <?= $form->field($model, 'hp_wa')->textInput(['maxlength' => true]) ?>
                            <!-- ?= $form->field($model, 'media_jurnalis')->textInput(['maxlength' => true]) ?> -->
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
                            <?= $form->field($model, 'wilayah')->textInput(['maxlength' => true]) ?>
                            <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>
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
