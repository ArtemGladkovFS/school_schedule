<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\search\ScheduleSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'teacher_id') ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'class_id') ?>

    <?php // echo $form->field($model, 'timepair_id') ?>

    <?php // echo $form->field($model, 'day_of_week') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
