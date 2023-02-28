<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kwitansi */

$this->title = 'Update Kwitansi: ' . $model->id_kwitansi;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi, 'url' => ['view', 'id_kwitansi' => $model->id_kwitansi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kwitansi-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
