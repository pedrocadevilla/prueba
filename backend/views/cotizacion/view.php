<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = $model->id_cotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id_cotizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_cotizacion], [
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
            'id_cotizacion',
            'ruc',
            'id_cliente',
            'id_vendedor',
        ],
    ]) ?>

</div>
