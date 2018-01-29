<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DetallePorcentaje */

$this->title = 'Create Detalle Porcentaje';
$this->params['breadcrumbs'][] = ['label' => 'Detalle Porcentajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalle-porcentaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
