<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Media $model */

$this->title = $model->id_media;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="media-view">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $model->nama_media ?></h3>
                    <div class="box-tools pull-right">
                    <?= Html::a('Update', ['update', 'id_media' => $model->id_media], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id_media' => $model->id_media], [
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
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body no-padding">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>ID Media</td>
                                                <td>
                                                    <?php 
                                                        $media= $model->id_media;
                                                        echo $media;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Media</td>
                                                <td>
                                                    <?php 
                                                        $nama= $model->nama_media;
                                                        echo $nama;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Media</td>
                                                <td>
                                                    <?php 
                                                        $jenis= $model->jenis_media;
                                                        echo $jenis;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nilai Kontrak</td>
                                                <td>
                                                    <?php 
                                                        $jnilai= $model->nilai_kontrak;
                                                        echo $jnilai;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Minimal Berita</td>
                                                <td>
                                                    <?php 
                                                        $minimal= $model->minimal_berita;
                                                        echo $minimal;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Harga Perberita</td>
                                                <td>
                                                    <?php 
                                                        $harga= $model->harga_perberita;
                                                        echo $harga;
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
