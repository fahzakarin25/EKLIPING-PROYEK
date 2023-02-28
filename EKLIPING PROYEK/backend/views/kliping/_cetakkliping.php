<?php

use backend\models\Kliping;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

$pdf = new Pdf([
        'format' => array(210,297),
        //'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        // 'mode' => Pdf::MODE_UTF8,
        'marginTop' => '10',
        'marginBottom' => '20',
        'marginLeft' => '25.4',
        'marginRight' => '25.4',
        'defaultFont' => 'Calibri',
        //'defaultFontSize' => '12'
    ]);
$mpdf = $pdf->api;

$imgPath = Yii::getAlias('@root').'/images';

$kategori =  $model->jenisKategori ? $model->jenisKategori->jenis_kategori : '-' ; 
$media = $model->namaMedia ? $model->namaMedia->nama_media : '-';
$jurnalis = $model->namaJurnalis ? $model->namaJurnalis->nama_jurnalis : '-';

$tgl_kliping = $model->tanggal;
$tanggal_indo = $model->tglIndo($tgl_kliping);

$root_folder = Yii::getAlias('@root');
$gambar = Html::img($root_folder . $model->lokasi_upload, ['class'=>'img-responsive']);

$html ='';

$html .='

        <table width = 100% border = 0>
            <tr>
                <td rowspan="5" align="left" style="width:32mm;padding-top:-3px;padding-bottom:-3px">'.Html::img($imgPath.'/pariaman.png',['height'=>'20mm']).'</td>
                <td align="center" style="height:5px ; font: size 12pt; padding:0px">PEMERINTAH KOTA PARIAMAN</td>
            </tr>
            <tr>
                <td align="center" style="font-size:14pt ; height:10px; padding:0px"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></td>
            </tr>
            <tr>
                <td align="center" style="font-size:9pt; height: 10px; padding:0px">
                    Alamat: Jl. Imam Bonjol No 44 Pariaman, Desa Cimparuah, Kecamatan Pariaman Tengah Kota Pariaman,25511
                    <br>
                    Website: //diskominfo.pariamankota.go.id E-mail:diskominfo@pariamankota.go.id
                </td>
            </tr>
        </table>

    <hr><br>

        <table width ="100%" border = "1">
            <tr>
                <td>Tanggal</td>
                <td>'.$tanggal_indo.'</td>
                <td>Kategori</td>
                <td>'.$kategori.'</td>
            </tr>
            <tr>
                <td>Media</td>
                <td>'.$media.'</td>
                <td>Jurnalis</td>
                <td>'.$jurnalis.'</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>

        <br>
        
        <table width ="100%" border = "0">
            <tr>
                <td>'.$gambar.'</td>
            </tr>
        </table>
';

// echo $html;
$mpdf->WriteHTML($html);
$mpdf->Output('kliping'.$model->id_kliping.'.pdf', 'I');

?>