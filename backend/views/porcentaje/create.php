<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Porcentaje */

$this->title = 'Create Porcentaje';
$this->params['breadcrumbs'][] = ['label' => 'Porcentajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="porcentaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
