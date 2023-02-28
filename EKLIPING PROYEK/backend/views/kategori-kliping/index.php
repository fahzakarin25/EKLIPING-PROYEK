<?php

use backend\models\KategoriKliping;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\KategoriKlipingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategori Kliping';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-kliping-index">
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kategori Kliping</h3>
                </div>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    // 'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'id_kategori',
                        'jenis_kategori',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id_kategori' => $model->id_kategori]);
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
