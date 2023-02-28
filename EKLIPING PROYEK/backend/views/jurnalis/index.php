<?php

use backend\models\Jurnalis;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\JurnalisSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jurnalis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurnalis-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Jurnalis</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_pers',
                        'nama_jurnalis',
                        // 'tempat_lahir',
                        // 'tanggal_lahir',
                        [
                            'attribute' => 'tempat_lahir',
                            'label'=>'Tempat Tanggal Lahir',
                            'value'=>function($model){
                                $tempatTinggal = $model->tempat_lahir;
                                $tanggalTinggal= $model->tanggal_lahir;
                                $tanggal_indo = $model->tglIndo($tanggalTinggal);
                                return $tempatTinggal.' '.','.' '.$tanggal_indo;
                            }
                        ],
                        // 'alamat:ntext',
                        // 'hp_wa',
                        // 'media_jurnalis',
                        [
                            'attribute' => 'media_jurnalis',
                            'label'=>'Media Jurnalis',
                            'value'=>function($model){
                                return $model->masukanMedia ? $model->masukanMedia->nama_media : '-';
                            }
                        ],
                        // 'wilayah',
                        'jabatan',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action,$model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_pers' => $model->id_pers]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>


</div>
