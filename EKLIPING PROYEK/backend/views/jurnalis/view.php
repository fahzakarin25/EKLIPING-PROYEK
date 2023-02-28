<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Jurnalis $model */

// $this->title = $model->id_pers;
$this->title = $model->nama_jurnalis;
$this->params['breadcrumbs'][] = ['label' => 'Jurnalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jurnalis-view">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nama : <?= $model->nama_jurnalis ?></h3>
                    <div class="box-tools pull-right">
                        <?= Html::a('Update', ['update', 'id_pers' => $model->id_pers], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id_pers' => $model->id_pers], [
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
                                                <td>Nama Jurnalis</td>
                                                <td>
                                                    <?php 
                                                        $namajur = $model->nama_jurnalis;
                                                        echo $namajur;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tempat Lahir</td>
                                                <td>
                                                    <?php 
                                                        $tempat = $model->tempat_lahir;
                                                        echo $tempat;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Lahir</td>
                                                <td>
                                                    <?php 
                                                        $tanggal = $model->tanggal_lahir;
                                                        $tanggal_indo = $model->tglIndo($tanggal);
                                                        echo $tanggal_indo;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>
                                                    <?php 
                                                        $alamat = $model->alamat;
                                                        echo $alamat;
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Nomor Whatshapp</td>
                                                <td>
                                                    <?php 
                                                        $nomor = $model->hp_wa;
                                                        echo $nomor;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Media Jurnalis</td>
                                                <td>
                                                    <?php 
                                                        $media = $model->masukanMedia->nama_media;
                                                        echo $media;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Wilayah Jurnalis</td>
                                                <td>
                                                    <?php 
                                                        $wilayah = $model->wilayah;
                                                        echo $wilayah;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jabatan Jurnalis</td>
                                                <td>
                                                    <?php 
                                                        $jabatan = $model->jabatan;
                                                        echo $jabatan;
                                                    ?>
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
