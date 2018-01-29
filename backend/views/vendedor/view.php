<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendedor */

$this->title = $model->id_vendedor;
$this->params['breadcrumbs'][] = ['label' => 'Vendedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_vendedor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_vendedor], [
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
            'id_vendedor',
            'nombre',
            'apellido',
            'cedula',
        ],
    ]) ?>

</div>
