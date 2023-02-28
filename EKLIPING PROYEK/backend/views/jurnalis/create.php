<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Jurnalis $model */

$this->title = 'Tambah Data Jurnalis';
$this->params['breadcrumbs'][] = ['label' => 'Jurnalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jurnalis-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
