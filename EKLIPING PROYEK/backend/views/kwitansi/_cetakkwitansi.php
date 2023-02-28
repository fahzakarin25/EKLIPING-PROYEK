<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\mpdf\Pdf;

use backend\models\Kwitansi;

$tahun = date('Y');
$pdf = new Pdf([
        'format' =>  array(210,147),  //ini ukuran kertas dalam mm210 x 297
        // 'format' =>  Pdf::FORMAT_A4,  //ini ukuran kertas dalam mm210 x 297
        'orientation' => Pdf::ORIENT_PORTRAIT,  //orientasi kertas protrait
        'marginTop'=>'7', //20mm
        'marginBottom'=>'5', //20mm
        'marginLeft'=>'15', //20mm
        'marginRight'=>'15', //20mm
        'defaultFont'=>'Calibri',
        'defaultFontSize'=>'10'
    ]); 
$mpdf = $pdf->api; // fetches mpdf apc_inc(key)

//$mpdf->SetFooter = '{PAGENO}';
//$mpdf->SetFooter('Tanggal Cetak '.date('d-M-Y H:i').'|'); 


$html='';

$html .= '       
  <table border ="0" width="100%">
    <tr>
      <td align="left" style="height:10px ; font-size:9pt; padding:0px">No.'.str_repeat('&nbsp;', 8).'/Kominfo/'.$tahun.'</td>
      <td align="right" style="height:10px ; font-size:9pt; padding:0px">No. Rek. 04.5.1.2.02.01.0062</td>
    </tr>

  </table>
';

$html .= '       
  <table border ="0" width="100%">
    <tr>
      <th align="center" style="font-size:10pt ; height:10px; padding:0px">DINAS KOMUNIKASI DAN INFORMATIKA KOTA PARIAMAN</th>
    </tr>
    <tr>
      <th align="center" style="font-size:10pt ; height:10px; padding:0px"><b><u>KWITANSI</u><b></th>
    </tr>

  </table>
  <hr><br>
';




    $nota = Kwitansi::find()
            ->where(['id_kwitansi'=>$model->id_kwitansi])
            ->one();

    $totalbayar = number_format("$nota->total_bayar", 0, ",", ".");
    $media = $nota->namaMedia ? $nota->namaMedia->nama_media : '-';
    $year = $nota->tahun;
    $moon = $nota->bulan;
    if ($moon == 1) {
        $moon_indo = 'Januari';
    } elseif ($moon == 2) {
        $moon_indo = 'Februari';
    } elseif ($moon == 3) {
        $moon_indo = 'Maret';
    } elseif ($moon == 4) {
        $moon_indo = 'April';
    } elseif ($moon == 5) {
        $moon_indo = 'Mei';
    } elseif ($moon == 6) {
        $moon_indo = 'Juni';
    } elseif ($moon == 7) {
        $moon_indo = 'Juli';
    } elseif ($moon == 8) {
        $moon_indo = 'Agustus';
    } elseif ($moon == 9) {
        $moon_indo = 'September';
    } elseif ($moon == 10) {
        $moon_indo = 'Oktober';
    } elseif ($moon == 11) {
        $moon_indo = 'November';
    } elseif ($moon == 12) {
        $moon_indo = 'Desember';
    } else{
        $moon_indo ='';
    }
$html .='
    <table width = 100% border ="0">
        <tr>
            <td><i>Sudah terima dari</i></td>
            <td>:</td>
            <td colspan=2>BENDAHARA PENGELUARAN DINAS KOMUNIKASI DAN INFORMATIKA KOTA PARIAMAN</td>
            <td></td>
        </tr>
        <tr>
            <td><i>Uang Sejumlah</i></td>
            <td>:</td>
            <td>Rp. '.$totalbayar.'</td>
        </tr>
        <tr>
            <td><td>
            <td><b><i>'.$nota->terbilang($nota->total_bayar).' rupiah.</i></b></td>
        </tr>
        <tr>
            <td><i>Sebab dari</i></td>
            <td>:</td>
            <td>Pembayaran belanja langganan media online '.$media.' Bulan '.$moon_indo.' '.$year.'. Pada Kegiatan Pengelolaan Konten dan Perencanaan Media Komunikasi Publik . (Pajak dan Bukti terlampir)</td>
            <td></td>
        </tr>
    </table>
';

$html.='
    <table style="width:100%">
        <tr>
            <td>
                <table width = "30%" border ="1" style="font-size: 8px; ">
                    <tr>
                        <td><i>Diterima Tgl</td>
                        <td>:</td>
                        <td colspan=3></i></td>
                    </tr>
                    <tr>
                        <td><i>Dibayar</td>
                        <td>:</td>
                        <td colspan=3></i></td>
                    </tr>
                    <tr>
                        <td><i>Dibukukan Tgl</td>
                        <td>:</td>
                        <td colspan=3></i></td>
                    </tr>
                    <tr>
                        <td><i>No Folio Buku Khas</td>
                        <td colspan=4></i></td>
                    </tr>
                    <tr>
                        <td colspan="5"><i>Barang-barang yang dibeli ini telah diterima dalam keadaan baik dan telah dibukukan sebagai barang inventaris / stock dalam daftar inventaris / stock</i></td>
                    </tr>
                    <tr>
                        <td ><i>No.</td>
                        <td colspan=2></i></td>
                        <td colspan=2><i>Tgl.</i></td>
                    </tr>
                    <tr>
                        <td><i>Oleh</td>
                        <td colspan=4>:</i></td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <td class="text2" align="center">Pariaman, 30 Januari 2023<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">Yang Menerima,<br><br><br><br><td>
                    </tr>
                    <tr>
                        <td class="text2" align="left">Nama Terang : Nindi Putri Dinanti</td>
                    </tr>
                    <tr>
                        <td class="text2" align="left">Alamat Terang : Padang</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
';


$html.='
    <table style="width:100%">
        <tr>
            <th>
                <table>
                    <tr>
                        <td class="text2" align="center">Setuju Bayar<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">Kuasa Pengguna Anggaran<br><br><br><br><td>
                    </tr>
                    <tr>
                        <td class="text2" align="center"><u>Elfadri.SS<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">NIP. 19830531 200902 1 005<td>
                    </tr>
                </table>
            </th>
            <th>
                <table>
                    <tr>
                        
                        <td class="text2" align="center">Lunas Tanggal<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">Bendahara Pengeluaran<br><br><br><br><td>
                    </tr>
                    <tr>
                        <td class="text2" align="center"><u>Erna Herawati<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">NIP. 19810726 201001 2 001<td>
                    </tr>
                </table>   
            </th>
            <th>
                <table>
                    <tr>
                        <td class="text2" align="center">Diketahui Oleh :<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">Pejabat Pelaksana Teknis Kegiatan<br><br><br><br><td>
                    </tr>
                    <tr>
                        <td class="text2" align="center"><u>Nini Sria Fivria. S.Kom<td>
                    </tr>
                    <tr>
                        <td class="text2" align="center">NIP. 19820305 200803 2 001<td>
                    </tr>
                </table>   
            </th>
        </tr>
    </table>
';

// echo $html;

$mpdf->WriteHTML($html);
$mpdf->Output('Kwitansi'.$model->id_kwitansi.'.pdf', 'I');
exit;