<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BeritaOnline $model */

$this->title = 'Tambah Berita Online';
$this->params['breadcrumbs'][] = ['label' => 'Berita Onlines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-online-create">
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
