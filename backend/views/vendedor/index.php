<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VendedorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendedors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vendedor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Vendedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_vendedor',
            'nombre',
            'apellido',
            'cedula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
