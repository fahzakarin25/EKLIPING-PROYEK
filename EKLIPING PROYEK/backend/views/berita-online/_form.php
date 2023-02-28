<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use backend\models\Media;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var backend\models\BeritaOnline $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="berita-online-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-md-12">

            <!-- ?= $form->field($model, 'id_jurnalis')->textInput() ?> -->
            <?= $form->field($model, 'judul_berita')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'url_berita')->textInput(['maxlength' => true]) ?>

            <!-- ?= $form->field($model, 'tanggal_publis')->textInput() ?> -->
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

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>
<?php ActiveForm::end(); ?>

</div>
