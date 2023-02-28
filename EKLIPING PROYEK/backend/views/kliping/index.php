<?php

use backend\models\Kliping;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\KlipingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kliping';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kliping-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kliping</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_kliping',
                        'judul',
                        // 'tanggal',
                        [
                            'attribute' => 'tanggal',
                            'label' => 'Tanggal',
                            'format' => 'raw',
                            'value' => function ($model) {
                                $tgl_kliping = $model->tanggal;
                                $tanggal_indo = $model->tglIndo($tgl_kliping);
                                return $tanggal_indo;
                            }
                        ],
                        // 'kategori',
                        [
                            'attribute' => 'kategori',
                            'label' => 'Kategori Kliping',
                            'value' => function ($model) {
                                return $model->jenisKategori ? $model->jenisKategori->jenis_kategori : '-';
                            }
                        ],
                        // 'media',
                        [
                            'attribute' => 'media',
                            'label' => 'Media',
                            'value' => function ($model) {
                                return $model->namaMedia ? $model->namaMedia->nama_media : '-';
                            }
                        ],
                        // 'jurnalis',
                        [
                            'attribute' => 'jurnalis',
                            'label' => 'Jurnalis',
                            'value' => function ($model) {
                                return $model->namaJurnalis ? $model->namaJurnalis->nama_jurnalis : '-';
                            }
                        ],
                        // 'lokasi_upload',
                        [
                            'attribute' => 'lokasi_upload',
                            'label' => 'Lokasi Upload',
                            'format' => 'Html',
                            'value' => function ($model) {
                                $root_folder = Yii::getAlias('@root');
                                // $gambar = Html::img($root_folder.$model->lokasi_upload,['class' => 'img-responsive']);
                                $gambar = Html::img($root_folder . $model->lokasi_upload, ['height' => 100]);
                                return $gambar;
                            }
                        ],
                        //'status_publis',
                        // 'create_time',
                        // 'update_time',
                        // 'create_by',
                        // 'update_by',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_kliping' => $model->id_kliping]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>