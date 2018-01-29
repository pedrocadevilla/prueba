<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_cotizacion')->textInput() ?>

    <?= $form->field($model, 'ruc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_cliente')->textInput() ?>

    <?= $form->field($model, 'id_vendedor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
