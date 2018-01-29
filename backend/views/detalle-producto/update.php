<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DetalleProducto */

$this->title = 'Update Detalle Producto: ' . $model->id_detalle_producto;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_detalle_producto, 'url' => ['view', 'id' => $model->id_detalle_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detalle-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
