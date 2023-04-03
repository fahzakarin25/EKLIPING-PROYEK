<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Kwitansi;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KwitansiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kwitansi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-warning">
    <!-- <div class="card-body"> -->
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kwitansi</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_kwitansi',
                        [
                            'attribute'=>'tahun',
                            'label'=>'Bulan/Tahun',
                            'value'=>function($model){
                                $year = $model->tahun;
                                $month = $model->bulan;
                                if ($month == '01') {
                                    $bulanindo = 'Januari';
                                }elseif($month == '02'){
                                    $bulanindo = 'Februari';
                                }elseif($month == '03'){
                                    $bulanindo = 'Maret';
                                }elseif($month == '04'){
                                    $bulanindo = 'April';
                                }elseif($month == '05'){
                                    $bulanindo = 'Mei';
                                }elseif($month == '06'){
                                    $bulanindo = 'Juni';
                                }elseif($month == '07'){
                                    $bulanindo = 'Juli';
                                }elseif($month == '08'){
                                    $bulanindo = 'Agustus';
                                }elseif($month == '09'){
                                    $bulanindo = 'September';
                                }elseif($month == '10'){
                                    $bulanindo = 'Oktober';
                                }elseif($month == '11'){
                                    $bulanindo = 'November';
                                }elseif($month == '12'){
                                    $bulanindo = 'Desember';
                                }else{
                                    $bulanindo = '';
                                }
                                return $bulanindo.' '.$year;
                            }
                        ],
                        [
                            'attribute' => 'media',
                            'label' => 'Media',
                            'format' => 'html',
                            'value' => function ($model) {
                                $med = $model->namaMedia ? $model->namaMedia->nama_media : '-';
                                return $med;
                            }
                        ],
                        // 'nilai_kontrak',
                        [
                            'attribute'=>'nilai_kontrak',
                            'label'=>'Nilai Kontrak',
                            'value'=>function($model){
                                $nilai = number_format("$model->nilai_kontrak", 0, ",", ".");
                                return 'Rp. '.$nilai;
                            }
                        ],
                        // 'jumlah_berita',
                        [
                            'attribute'=>'jumlah_berita',
                            'label'=>'Berita',
                            'format'=>'html',
                            'value'=>function($model){
                                $jumberita = $model->jumlah_berita;
                                $minberita = $model->minimal_berita;
                                $hargaberita = number_format("$model->harga_perberita", 0, ",", ".");
                                return 'Berita Terverifikasi: <b>'.$jumberita.'</b><br>'.'Minimal Berita: <b>'.$minberita.'</b><br>'.
                                'Harga @Berita: <b>'.$hargaberita.'</b>';
                            }
                        ],
                        // 'minimal_berita',
                        // 'total_bayar',
                        [
                            'attribute'=>'total_bayar',
                            'label'=>'Total Bayar',
                            'value'=>function($model){
                                $total = number_format("$model->total_bayar", 0, ",", ".");
                                return 'Rp. '.$total;
                            }
                        ],
                        //'harga_perberita',
                        //'bulan',
                        //'tahun',
                        // 'status_cetak',
                        [
                            'attribute'=>'jumlah_berita',
                            'label'=>'Status Cetak',
                            'format'=>'raw',
                            'value'=>function($model){
                                $cetak = $model->status_cetak;
                                    if ($cetak == 1) {
                                        $stat = '<span class="badge bg-warning">Belum Dicetak</span>';
                                    }elseif($cetak == 2) {
                                        $stat = '<span class="badge bg-success">Sudah Dicetak</span>';
                                    }else {
                                        $stat = '';
                                    }

                                $roleName = Yii::$app->user->identity->role->name; //menampilkan nama sesuai dengan nama role yang dipilih

                                if($roleName=='Media'){ //tampilan untuk verifikator
                                    $tombolcetak =  Html::a('<i class="fas fa-print"></i> Cetak ', ['cetak-kwitansi','hash_data'=>$model->hash_data], ['class' => 'btn btn-block btn-info btn-xs']);
                                }else{ 
                                    $tombolcetak = ' ';
                                }

                                $cetak = $model->status_cetak;

                                if($cetak == 1) {
                                    $tombol = $tombolcetak;
                                }else{
                                    $tombol = ' ';
                                }
                                
                                return $stat.'<br>'.$tombol;
                            }
                        ],
                    
                        //'create_at',
                        //'create_by',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Kwitansi $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_kwitansi' => $model->id_kwitansi]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

