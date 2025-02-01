<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Timepair $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="timepair-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'start_pair')->textInput() ?>

    <?= $form->field($model, 'end_pair')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
