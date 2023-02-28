<?php

use yii\base\Model;
use yii\helpers\Html;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var backend\models\Kliping $model */

$this->title = $model->judul;
$this->params['breadcrumbs'][] = ['label' => 'Kliping', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="kliping-view">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Judul : <?= $model->judul ?></h3>
                    <div class="box-tools pull-right">
                        <?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i> Update', ['update', 'id_kliping' => $model->id_kliping], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Delete', ['delete', 'id_kliping' => $model->id_kliping], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                        <?= Html::a('<i class="fa fa-print" aria-hidden="true"></i> Print', ['cetak-kliping', 'id_kliping' => $model->id_kliping], ['class' => 'btn btn-warning']) ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td>
                                                    <?php
                                                    $tanggal = $model->tanggal;
                                                    $tanggal_indo = $model->tglIndo($tanggal);
                                                    echo $tanggal_indo;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>Kategori</td>
                                                <td>
                                                    <?php
                                                    $kategori = $model->jenisKategori->jenis_kategori;
                                                    echo $kategori;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Media</td>
                                                <td>
                                                    <?php
                                                    $media = $model->namaMedia->nama_media;
                                                    echo $media;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jurnalis</td>
                                                <td>
                                                    <?php
                                                    $jurnalis = $model->namaJurnalis->nama_jurnalis;
                                                    echo $jurnalis;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status Public</td>
                                                <td>
                                                    <?php
                                                    $stat = $model->status_publis;
                                                    if ($stat == 1) {
                                                        $status = '<span class="label label-success">Publish</span>';
                                                    } elseif ($stat == 2) {
                                                        $status = '<span class="label label-danger">Tidak Publish</span>';
                                                    } else {
                                                        $status = '';
                                                    }

                                                    echo $status;
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $root_folder = Yii::getAlias('@root');
                            $gambar = Html::img($root_folder . $model->lokasi_upload, ['class' => 'img-responsive']);

                            echo $gambar;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>