<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CampaignSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'target_age_start') ?>

    <?= $form->field($model, 'target_age_end') ?>

    <?= $form->field($model, 'target_sex') ?>

    <?php // echo $form->field($model, 'target_provcode') ?>

    <?php // echo $form->field($model, 'target_distcode') ?>

    <?php // echo $form->field($model, 'target_subdistcode') ?>

    <?php // echo $form->field($model, 'target_hospcode') ?>

    <?php // echo $form->field($model, 'target_chronic') ?>

    <?php // echo $form->field($model, 'detail_url') ?>

    <?php // echo $form->field($model, 'thumbnail_url') ?>

    <?php // echo $form->field($model, 'intro') ?>

    <?php // echo $form->field($model, 'startdate') ?>

    <?php // echo $form->field($model, 'enddate') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <?php // echo $form->field($model, 'publisher_id') ?>

    <?php // echo $form->field($model, 'publisher_url') ?>

    <?php // echo $form->field($model, 'hotline_number') ?>

    <?php // echo $form->field($model, 'redirect2publisher') ?>

    <?php // echo $form->field($model, 'full_detail') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
