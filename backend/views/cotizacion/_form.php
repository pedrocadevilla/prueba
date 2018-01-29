<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Cliente;
use backend\models\Vendedor;
use backend\models\DetalleProducto;
use backend\models\Producto;
use backend\models\Porcentaje;
use backend\models\DetallePorcentaje;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'id_cliente')->dropDownList(
        ArrayHelper::map(Cliente::find()->all(), 'id_cliente', 'nombre'), 
        [
            'prompt'=>'Elegir Cliente',
            'id'=>'cliente'
        ]
    ) ?>

    <?= $form->field($model, 'ruc')->textInput(['maxlength' => true, 'id'=>'ruc']) ?>

    <?= $form->field($model, 'id_vendedor')->dropDownList(
        ArrayHelper::map(Vendedor::find()->all(), 'id_vendedor', 'nombre'), 
        [
            'prompt'=>'Elegir Vendedor'
        ]
    ) ?>

        <div class="panel-body col-sm-6">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $detalle[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_producto',
                    'cantidad',
                    'total',
                ],
            ]); ?>
    <div class="container-items col-sm-12"><!-- widgetContainer -->
            <?php foreach ($detalle as $i => $det): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Productos</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs" id="add"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs" id="remove"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $det->isNewRecord) {
                                echo Html::activeHiddenInput($det, "[{$i}]id_cotizacion");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                               <?= $form->field($det, "[{$i}]id_producto")->dropDownList(
                                    ArrayHelper::map(Producto::find()->all(), 'id_producto', 'nombre'), 
                                    [
                                        'prompt'=>'Elegir Producto',
                                        'id'=>"producto$i"
                                    ]
                                ) ?>
                            </div>

                            <div class="col-sm-3">
                                <?= $form->field($det, "[{$i}]cantidad")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($det, "[{$i}]total")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>

    <div class="panel-body col-sm-6">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item2', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item2', // css class
                'deleteButton' => '.remove-item2', // css class
                'model' => $porcentaje[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'id_porcentaje',
                    'montopor',
                ],
            ]); ?>
    <div class="container-items col-sm-12"><!-- widgetContainer -->
            <?php foreach ($porcentaje as $i => $por): ?>
                <div class="item2 panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Porcentajes</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item2 btn btn-success btn-xs" id="add"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item2 btn btn-danger btn-xs" id="remove"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $por->isNewRecord) {
                                echo Html::activeHiddenInput($por, "[{$i}]id_cotizacion");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                               <?= $form->field($por, "[{$i}]id_porcentaje")->dropDownList(
                                    ArrayHelper::map(Porcentaje::find()->all(), 'id_porcentaje', 'descripcion'), 
                                    [
                                        'prompt'=>'Elegir porcentaje',
                                        'id'=>"porcentaje$i"
                                    ]
                                ) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($por, "[{$i}]montopor")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        <div class="col-sm-2 hidden">
            <h2 id="precio"></h2>
        </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Modificar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS

    $("#producto0").change(function(){
        var id = $(this).val();
        $.get('index.php?r=producto/get-precio', { id : id }, function(data){
            var data = $.parseJSON(data);
            $('#precio').html(data.precio);
        });
    });

    $("#detalleproducto-0-cantidad").change(function(){
        var a = parseInt(document.getElementById('precio').innerText);
        $('#detalleproducto-0-total').attr('value', a*document.getElementById('detalleproducto-0-cantidad').value);
    });
    $("#porcentaje0").change(function(){
        var idp = $(this).val();
        $.get('index.php?r=porcentaje/get-porcentaje', { idp : idp }, function(data){
            var data = $.parseJSON(data);
            $('#detalleporcentaje-0-montopor').attr('value', data.porcentaje);
        });
    });
    $("#cliente").change(function(){
        var idc = $(this).val();
        $.get('index.php?r=cliente/get-ruc-id', { idc : idc }, function(data){
            var data = $.parseJSON(data);
            $('#ruc').attr('value', data.ruc);
        });
    });
    
JS;
$this->registerJs($script);
?>