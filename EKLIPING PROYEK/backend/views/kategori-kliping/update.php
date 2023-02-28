<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\KategoriKliping $model */

$this->title = 'Update Kategori Kliping: ' . $model->id_kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Kliping', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kategori, 'url' => ['view', 'id_kategori' => $model->id_kategori]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kategori-kliping-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
