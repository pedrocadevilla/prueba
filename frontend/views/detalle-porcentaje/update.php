<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallePorcentaje */

$this->title = 'Update Detalle Porcentaje: ' . $model->id_detalle_porcentaje;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Porcentajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalle_porcentaje, 'url' => ['view', 'id' => $model->id_detalle_porcentaje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-porcentaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
