<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Teacher $model */

$this->title = 'Create Teachers';
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teachers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
