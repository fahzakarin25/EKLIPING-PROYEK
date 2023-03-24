<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Kwitansi */

$this->title = $model->id_kwitansi;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kwitansi-view">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id_kwitansi' => $model->id_kwitansi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_kwitansi' => $model->id_kwitansi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id_kwitansi',
                            'id_media',
                            'nilai_kontrak',
                            'jumlah_berita',
                            'minimal_berita',
                            'harga_perberita',
                            'total_bayar',
                            'bulan',
                            'tahun',
                            'status_cetak',
                            'create_at',
                            'create_by',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

</div>
