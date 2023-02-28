<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\BeritaJurnalis $model */

$this->title = $model->id_berita_jurnalis;
$this->params['breadcrumbs'][] = ['label' => 'Berita Jurnalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="berita-jurnalis-view">

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Judul : <?= $model->id_berita_jurnalis ?></h3>
                    <div class="box-tools pull-right">
                        <?= Html::a('<i class="fa fa-undo" aria-hidden="true"></i> Update', ['update', 'id_berita_jurnalis' => $model->id_berita_jurnalis], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i> Delete', ['delete', 'id_berita_jurnalis' => $model->id_berita_jurnalis], [
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
                        <div class="box">
                            <div class="box-body no-padding">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td> Nama Jurnalis</td>
                                            <td>
                                                <?php
                                                $jurnalis = $model->namoJurnalis->nama_jurnalis;
                                                echo $jurnalis;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <?php
                                                $stat = $model->status;
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
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>
                                                <?php
                                                $tanggal = $model->tanggal_publis;
                                                $tanggal_indo = $model->tglIndo($tanggal);
                                                echo $tanggal_indo;
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Kontrak</td>
                                            <td>
                                                <?= $model->nilai_kontrak ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nilai Kontrak</td>
                                            <td>
                                                <?= $model->url_berita ?>
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
</div>
