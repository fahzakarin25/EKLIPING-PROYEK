<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\BeritaOnline $model */

// $this->title = $model->id_berita;
$this->title = $model->judul_berita;
$this->params['breadcrumbs'][] = ['label' => 'Berita Online', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berita-online-view">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Judul : <?= $model->judul_berita ?></h3>
                    <div class="box-tools pull-right">
                        <?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i> Update', ['update', 'id_berita' => $model->id_berita], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Delete', ['delete', 'id_berita' => $model->id_berita], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
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
                                                <td>Judul Berita</td>
                                                <td>
                                                    <?= $model->judul_berita ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Url Berita</td>
                                                <td>
                                                    <?= $model->url_berita ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Publis</td>
                                                <td>
                                                    <?php
                                                    $tanggal = $model->tanggal_publis;
                                                    $tanggal_indo = $model->tglIndo($tanggal);
                                                    echo $tanggal_indo;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Media</td>
                                                <td>
                                                    <?php
                                                    $media = $model->nameMedia->nama_media;
                                                    echo $media;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                            <td>Status</td>
                                            <td>
                                                <?php
                                                $stat = $model->status;
                                                if ($stat == 1) {
                                                    $status = '<span class="label label-warning">Belum Terverifikasi</span>';
                                                } elseif ($stat == 2) {
                                                    $status = '<span class="label label-success">Sudah Terverifikasi</span>';
                                                } else {
                                                    $status = '';
                                                }

                                                echo $status;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Create At</td>
                                            <td>
                                                <?= $model->create_at ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Update At</td>
                                            <td>
                                                <?= $model->update_at ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Create By</td>
                                            <td>
                                                <?= $model->create_by ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Update By</td>
                                            <td>
                                                <?= $model->update_by ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
