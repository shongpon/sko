<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PushForm */
/* @var $form ActiveForm */
?>
<div class="push2">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'sex') ?>
        <?= $form->field($model, 'age') ?>
        <?= $form->field($model, 'provcode') ?>
        <?= $form->field($model, 'distcode') ?>
        <?= $form->field($model, 'subdistcode') ?>
        <?= $form->field($model, 'hoscode') ?>
        <?= $form->field($model, 'msg') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- push2 -->
