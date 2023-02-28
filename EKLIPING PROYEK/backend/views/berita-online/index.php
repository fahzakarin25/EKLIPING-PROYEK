<?php

use backend\models\BeritaOnline;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\BeritaOnlineSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Berita Online';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="berita-online-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Berita Online</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_berita',
                        // 'judul_berita',
                        [
                            'attribute' => 'judul_berita',
                            'label' => 'Judul Berita',
                            'format' => 'html',
                            'contentOptions' => ['style' => 'width:30%; white-space: normal;'],
                            'value' => function ($model) {
                                // $judul = $model->judul_berita;
                                $judul = Html::a($model->judul_berita.'<br>'.'<i class="fa fa-newspaper-o" aria-hidden="true"></i>'.' '.'Penulis'.' '.':');
                                // $media = $model->tampilMedia->nama_media;
                                $media = $model->nameMedia ? $model->nameMedia->nama_media: '-';
                                return $judul.' '.$media;
                            }
                        ],
                        // 'url_berita:url',
                        [
                            'attribute' => 'url_berita',
                            'label' => 'Url Berita',
                            'format' => 'raw',
                            'contentOptions' => ['style' => 'width:30%; white-space: normal;'],
                            'value' => function ($model) {
                                $url = Html::a($model->url_berita,Yii::getAlias($model->url_berita)); //yiialias erguna untuk membuka tab baru
                                $kalimat = '<em> Klik link berita diatas untuk melihat isi berita </em>';
                                return $url.'<br>'.$kalimat;
                            }
                        ],
                        // 'tanggal_publis',
                        [
                            'attribute' => 'tanggal_publis',
                            'label' => 'Tanggal Publis',
                            'format' => 'raw',
                            'contentOptions' => ['style' => 'width:30%; white-space: normal;'],
                            'value' => function ($model) {
                                $tgl_publis = $model->tanggal_publis;
                                $tanggal_indo = $model->tglIndo($tgl_publis);
                                return $tanggal_indo;
                            }
                        ],
                        // 'status',
                        [
                            'attribute' => 'status',
                            'label' => 'Status',
                            'format' => 'html',
                            'contentOptions' => ['style' => 'width:30%; white-space: normal;'],
                            'value' => function ($model) {
                                //ifelse untuk status
                                $stat = $model->status;
                                    if ($stat == 1) {
                                        $status = '<span class="label label-warning">Belum Terverifikasi</span>';
                                    } elseif ($stat == 2) {
                                        $status = '<span class="label label-success">Sudah Terverifikasi</span>';
                                    } else {
                                        $status = '';
                                    }

                                //ifelse untuk verifikator
                                $roleName = Yii::$app->user->identity->role->name; //menampilkan nama sesuai dengan nama role yang dipilih

                                if($roleName=='Verifikator'){ //tampilan untuk verifikator
                                    $tombol = Html::a('<i class="fa fa-check" aria-hidden="true"></i> Verifikasi', ['setujui-berita', 'id_berita' => $model->id_berita], ['class' => 'btn btn-success btn-xs' ]);
                                }else{ 
                                    $tombol = ' ';
                                }

                                //tombol verifikasi hilang jika sudah terverifikasi
                                $stat = $model->status;
                                
                                if($stat == 1) {
                                    $keluar = $tombol;
                                }else{
                                    $keluar = ' ';
                                }

                                // $tanggal = $model->tglIndo($model->tanggal_publis); //tes aja
                                $tanggal = $model->tanggal_verifikasi;
                                return $status.'<br>'.$keluar.'Tanggal'.' :'.$tanggal;


                            }
                        ],
                        [
                            'label' => ' ',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $edit = Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>',
                                ['update', 'id_berita' => $model->id_berita]);
                                $view = Html::a('<i class="fa fa-eye" aria-hidden="true"></i>',
                                ['view', 'id_berita' => $model->id_berita]);
                                $delete = Html::a('<i class="fa fa-trash" aria-hidden="true"></i>',
                                ['delete', 'id_berita' => $model->id_berita],[
                                    'class' => '<i class="fa fa-trash" aria-hidden="true"></i>',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]);

                                $roleName = Yii::$app->user->identity->role->name;
                                if($roleName == 'Media' || $roleName == 'Admin') {
                                    return $view.' '.$edit.' '.$delete;
                                }else{
                                    return $view;
                                }
                                
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
