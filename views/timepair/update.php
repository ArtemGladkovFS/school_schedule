<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Timepair $model */

$this->title = 'Update Timepair: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Timepairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="timepair-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
