<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetallePorcentaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-porcentaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'montopor')->textInput() ?>

    <?= $form->field($model, 'id_cotizacion')->textInput() ?>

    <?= $form->field($model, 'id_porcentaje')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
