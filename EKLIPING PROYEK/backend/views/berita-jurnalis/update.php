<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BeritaJurnalis $model */

$this->title = 'Update Berita Jurnalis: ' . $model->id_berita_jurnalis;
$this->params['breadcrumbs'][] = ['label' => 'Berita Jurnalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_berita_jurnalis, 'url' => ['view', 'id_berita_jurnalis' => $model->id_berita_jurnalis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="berita-jurnalis-update">

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
