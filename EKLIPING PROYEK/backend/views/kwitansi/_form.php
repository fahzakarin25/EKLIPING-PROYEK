<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use backend\models\Media;
/* @var $this yii\web\View */
/* @var $model backend\models\Kwitansi */
/* @var $form yii\widgets\ActiveForm */
$range = range(date('Y'), 2022);
?>

<div class="kwitansi-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">

            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'tahun')->dropDownList(array_combine($range, $range), ['onchange'=>'getNilaiKontrak()','id'=>'tahun']); ?>
                </div>
                <div class="col-sm-6">
                    <?php
                        $bulan = [
                            '01'=>'Januari',
                            '02'=>'Februari',
                            '03' =>'Maret',
                            '04' => 'April',
                            '05' => 'Mei',
                            '06' => 'Juni',
                            '07' => 'Juli',
                            '08' => 'Agustus',
                            '09' => 'September',
                            '10' => 'Oktober',
                            '11' => 'November',
                            '12' => 'Desember',
                        ];
                        echo $form->field($model, 'bulan')->dropDownList($bulan,[
                            'prompt'=>'--Pilih Bulan--',
                            'id'=>'bulan',
                            'onChange'=>'getNilaiKontrak()',
                        ]) 
                    ?>
                </div>
                
            </div>

            <?php
                $datamedia = (new Media)->getDataMedia();
                    echo $form->field($model, 'id_media')->widget(Select2::classname())->dropDownList($datamedia,[
                        'prompt'=>'--Cari Media--',
                        'onchange'=> 'getNilaiKontrak()',
                        'id'=>'id_media',
                    ])->label('Media');
            ?>
            <div class="row">
                <div class="col-sm-4">
                    <?= $form->field($model, 'nilai_kontrak')->textInput(['id'=>'nilai_kontrak','readOnly'=>true])->label('Nilai Kontrak') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'minimal_berita')->textInput(['id'=>'minimal_berita','readOnly'=>true])->label('Minimal Berita Per Kontrak') ?>
                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'harga_perberita')->textInput(['id'=>'harga_perberita','readOnly'=>true])->label('Harga Per Berita') ?>                
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'jumlah_berita')->textInput(['id'=>'jumlah_berita','readOnly'=>true]) ?>

            <?= $form->field($model, 'total_bayar')->textInput(['id'=>'total_bayar','readOnly'=>true]) ?>

            <?php // echo $form->field($model, 'status_cetak')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i> Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php // echo $form->field($model, 'create_at')->textInput() ?>

    <?php // echo $form->field($model, 'create_by')->textInput() ?>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    

    function getNilaiKontrak(){

        var bulan = $("#bulan").val(); 
        var tahun = $("#tahun").val(); 
        var id_media = $("#id_media").val(); 

        var baseurl="<?php print Yii::$app->request->baseUrl;?>";

        $.post(baseurl+'/media/cek-media?bulan='+bulan+'&tahun='+tahun+'&id_media='+id_media, function( data ) {
            $("#nilai_kontrak").val(data.nilai_kontrak); 
            $("#minimal_berita").val(data.minimal_berita); 
            $("#harga_perberita").val(data.harga_perberita); 
            $("#jumlah_berita").val(data.jumlah_berita); 
            countjumlah();

        });

    }

    function countjumlah(){
        
        var nilai_kontrak = $('#nilai_kontrak').val();
        var minimal_berita = $('#minimal_berita').val();
        var harga_perberita = $('#harga_perberita').val();
        var jumlah_berita = $('#jumlah_berita').val();

        if (jumlah_berita < 30) {
            var total_bayar = jumlah_berita * harga_perberita;
        } else{
            var total_bayar = nilai_kontrak;
        }

        $('#total_bayar').val(total_bayar);
    }
</script>