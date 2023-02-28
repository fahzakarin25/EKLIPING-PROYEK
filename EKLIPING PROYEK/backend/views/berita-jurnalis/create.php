<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\BeritaJurnalis $model */

$this->title = 'Create Berita Jurnalis';
$this->params['breadcrumbs'][] = ['label' => 'Berita Jurnalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="berita-jurnalis-create">

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
