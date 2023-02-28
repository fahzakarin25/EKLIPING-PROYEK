<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Jurnalis $model */

$this->title = 'Update Jurnalis: ' . $model->nama_jurnalis;
$this->params['breadcrumbs'][] = ['label' => 'Jurnalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pers, 'url' => ['view', 'id_pers' => $model->id_pers]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jurnalis-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
