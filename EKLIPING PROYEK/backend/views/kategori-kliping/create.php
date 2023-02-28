<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\KategoriKliping $model */

$this->title = 'Tambah Data Kategori Kliping';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Kliping', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-kliping-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
