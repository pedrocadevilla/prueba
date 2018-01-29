<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PorcentajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Porcentajes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="porcentaje-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Porcentaje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_porcentaje',
            'tipo',
            'descripcion',
            'porcentaje',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
