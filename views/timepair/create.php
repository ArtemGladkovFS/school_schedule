<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Timepair $model */

$this->title = 'Create Timepair';
$this->params['breadcrumbs'][] = ['label' => 'Timepairs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timepair-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
