<?php

use backend\models\BeritaJurnalis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\BeritaJurnalisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Berita Jurnalis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-jurnalis-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kliping</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id_berita_jurnalis',
                        // 'id_jurnalis',
                        [
                            'attribute' => 'id_jurnalis',
                            'label' => 'Nama Jurnalis',
                            'value' => function ($model) {
                                return $model->namoJurnalis ? $model->namoJurnalis->nama_jurnalis : '-';
                            }
                        ],
                        'tanggal_publis',
                        'nilai_kontrak',
                        'status',
                        //'url_berita:url',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, BeritaJurnalis $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_berita_jurnalis' => $model->id_berita_jurnalis]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
