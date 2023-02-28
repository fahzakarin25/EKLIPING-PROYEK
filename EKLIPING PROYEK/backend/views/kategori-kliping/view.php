<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\KategoriKliping $model */

$this->title = $model->id_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Kliping', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategori-kliping-view">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $model->jenis_kategori ?></h3>
                    <div class="box-tools pull-right">
                    <?= Html::a('Update', ['update', 'id_kategori' => $model->id_kategori], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a('Delete', ['delete', 'id_kategori' => $model->id_kategori], [
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
                                                <td>ID Kategori Kliping</td>
                                                <td>
                                                    <?php 
                                                        $id= $model->id_kategori;
                                                        echo $id;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kategori Kliping</td>
                                                <td>
                                                    <?php 
                                                        $jenis= $model->jenis_kategori;
                                                        echo $jenis;
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
