<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BeritaOnline $model */

$this->title = 'Update Berita Online: ' . $model->id_berita;
$this->params['breadcrumbs'][] = ['label' => 'Berita Online', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_berita, 'url' => ['view', 'id_berita' => $model->id_berita]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berita-online-update">
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
