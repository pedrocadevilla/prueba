<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Porcentaje */

$this->title = $model->id_porcentaje;
$this->params['breadcrumbs'][] = ['label' => 'Porcentajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="porcentaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id_porcentaje], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id_porcentaje], [
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
            'id_porcentaje',
            'tipo',
            'descripcion',
            'porcentaje',
        ],
    ]) ?>

</div>
