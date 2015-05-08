<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Campaign */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'target_age_start',
            'target_age_end',
            'target_sex',
            'target_provcode',
            'target_distcode',
            'target_subdistcode',
            'target_hospcode',
            'target_chronic',
            'detail_url:url',
            'thumbnail_url:url',
            'intro:ntext',
            'startdate',
            'enddate',
            'userid',
            'publisher_id',
            'publisher_url:url',
            'hotline_number',
            'redirect2publisher',
            'full_detail:ntext',
            'publish',
        ],
    ]) ?>

</div>
