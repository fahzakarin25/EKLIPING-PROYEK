<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Kliping $model */

$this->title = 'Update Kliping: ' . $model->id_kliping;
$this->params['breadcrumbs'][] = ['label' => 'Kliping', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kliping, 'url' => ['view', 'id_kliping' => $model->id_kliping]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kliping-update">
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
