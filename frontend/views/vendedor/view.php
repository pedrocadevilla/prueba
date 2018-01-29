<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Vendedor */

$this->title = $model->id_vendedor;
$this->params['breadcrumbs'][] = ['label' => 'Vendedors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_vendedor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_vendedor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
