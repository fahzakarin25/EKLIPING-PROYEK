<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Kliping $model */

$this->title = 'Tambah Data Kliping';
$this->params['breadcrumbs'][] = ['label' => 'Kliping', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kliping-create">
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
