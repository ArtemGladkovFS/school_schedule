<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Teachers $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ 'male' => 'Male', 'female' => 'Female', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'degree')->textInput() ?>

    <?= $form->field($model, 'experience')->textInput() ?>

    <?= $form->field($model, 'salary')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
