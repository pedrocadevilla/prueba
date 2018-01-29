<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DetallePorcentajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detalle Porcentajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-porcentaje-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detalle Porcentaje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_detalle_porcentaje',
            'montopor',
            'id_cotizacion',
            'id_porcentaje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
