<?php

use backend\models\Media;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\MediaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="media-index">
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Media</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                         // 'id_media',
                        'nama_media',
                        'jenis_media',
                        // 'nilai_kontrak',
                        [
                            'attribute'=>'nilai_kontrak',
                            'label'=>'Nilai Kontrak',
                            'value'=>function($model){
                                $tot = number_format("$model->nilai_kontrak", 0, ",", ".");
                                return 'Rp. '.$tot;
                            }
                        ],
                        'minimal_berita',
                        [
                            'attribute'=>'harga_perberita',
                            'label'=>'Harga Per Berita',
                            'value'=>function($model){
                                $hagra = number_format("$model->harga_perberita", 0, ",", ".");
                                return 'Rp. '.$hagra;
                            }
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Media $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_media' => $model->id_media]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
