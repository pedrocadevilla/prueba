<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallePorcentaje */

$this->title = $model->id_detalle_porcentaje;
$this->params['breadcrumbs'][] = ['label' => 'Detalle Porcentajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-porcentaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_detalle_porcentaje], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_detalle_porcentaje], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Seguro que quieres borrar este dato?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_detalle_porcentaje',
            'montopor',
            'id_cotizacion',
            'id_porcentaje',
        ],
    ]) ?>

</div>
