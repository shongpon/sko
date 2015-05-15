<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'target_age_start')->textInput() ?>

    <?= $form->field($model, 'target_age_end')->textInput() ?>

    <?= $form->field($model, 'target_sex')->textInput(['maxlength' => 1]) ?>

    <?= $form->field($model, 'target_provcode')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'target_distcode')->textInput(['maxlength' => 4]) ?>

    <?= $form->field($model, 'target_subdistcode')->textInput(['maxlength' => 6]) ?>

    <?= $form->field($model, 'target_hospcode')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'target_chronic')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'detail_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'thumbnail_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'startdate')->textInput() ?>

    <?= $form->field($model, 'enddate')->textInput() ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'publisher_id')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'publisher_url')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'hotline_number')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'redirect2publisher')->textInput() ?>

    <?= $form->field($model, 'full_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publish')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
