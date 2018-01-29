<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetalleProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_detalle_producto') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'id_cotizacion') ?>

    <?= $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
