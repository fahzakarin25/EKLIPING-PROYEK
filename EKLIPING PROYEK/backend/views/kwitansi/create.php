<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Kwitansi */

$this->title = 'Buat Kwitansi';
$this->params['breadcrumbs'][] = ['label' => 'Kwitansi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-outline card-warning">
	<div class="card-body">
		<?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
	</div>

</div>
