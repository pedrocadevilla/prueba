<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PorcentajeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="porcentaje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_porcentaje') ?>

    <?= $form->field($model, 'tipo') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'porcentaje') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
