<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DetalleProducto */

$this->title = 'Create Detalle Producto';
$this->params['breadcrumbs'][] = ['label' => 'Detalle Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
