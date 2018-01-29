<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = 'Create Cotizacion';
$this->params['breadcrumbs'][] = ['label' => 'Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
