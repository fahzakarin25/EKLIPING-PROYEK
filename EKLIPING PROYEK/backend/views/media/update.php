<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Media $model */

$this->title = 'Update Data Media: ' . $model->id_media;
$this->params['breadcrumbs'][] = ['label' => 'Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_media, 'url' => ['view', 'id_media' => $model->id_media]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="media-update">
    <div class="box box-solid box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
        </div>
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
    </div>
</div>
