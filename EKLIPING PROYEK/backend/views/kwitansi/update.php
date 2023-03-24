<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kwitansi */

$this->title = 'Update Kwitansi: ' . $model->id_kwitansi;
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kwitansi, 'url' => ['view', 'id_kwitansi' => $model->id_kwitansi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kwitansi-update">

    <!-- <h1>?= Html::encode($this->title) ?></h1> -->

    <div class="box box-solid box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
            <div class="box-body">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
    </div>

</div>
