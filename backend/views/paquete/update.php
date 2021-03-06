<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Paquete */

$this->title = 'Update Paquete: ' . $model->id_paquete;
$this->params['breadcrumbs'][] = ['label' => 'Paquetes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_paquete, 'url' => ['view', 'id' => $model->id_paquete]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paquete-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
