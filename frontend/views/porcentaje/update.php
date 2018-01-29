<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Porcentaje */

$this->title = 'Update Porcentaje: ' . $model->id_porcentaje;
$this->params['breadcrumbs'][] = ['label' => 'Porcentajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_porcentaje, 'url' => ['view', 'id' => $model->id_porcentaje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="porcentaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
