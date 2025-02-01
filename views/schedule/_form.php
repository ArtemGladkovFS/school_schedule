<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Schedule $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->textInput() ?>

    <?= $form->field($model, 'room_id')->textInput() ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'class_id')->textInput() ?>

    <?= $form->field($model, 'timepair_id')->textInput() ?>

    <?= $form->field($model, 'day_of_week')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
