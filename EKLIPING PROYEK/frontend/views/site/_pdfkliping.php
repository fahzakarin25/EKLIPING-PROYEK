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

$html ='';
foreach ($model as $mod){

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
    ';

        $kategori =  $mod->jenisKategori ? $mod->jenisKategori->jenis_kategori : '-' ; 
        $media = $mod->namaMedia ? $mod->namaMedia->nama_media : '-';
        $jurnalis = $mod->namaJurnalis ? $mod->namaJurnalis->nama_jurnalis : '-';

        $tgl_kliping = $mod->tanggal;
        $tanggal_indo = $mod->tglIndo($tgl_kliping);

        $root_folder = Yii::getAlias('@root');
        $gambar = Html::img($root_folder . $mod->lokasi_upload, ['class'=>'img-responsive']);

    $html .='
        <table width ="100%" border = "1" align="center">
            <tr>
                <td>Tanggal</td>
                <td><b>'.$tanggal_indo.'</b></td>
                <td>Media</td>
                <td><b>'.$media.'</b></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td><b>'.$kategori.'</b></td>
                <td>Jurnalis</td>
                <td><b>'.$jurnalis.'</b></td>
            </tr>
        </table>
    
        <br><br>
    ';
    
    $html .='
        <table width ="100%" border = "0"  align="center">
            <tr>
                <td>'.$gambar.'</td>
            </tr>
        </table>

    ';

    $html .='<pagebreak>';
}

// echo $html;
    $mpdf->WriteHTML($html);
    $mpdf->Output('kliping'.$mod->id_kliping.'.pdf', 'I');
?>
