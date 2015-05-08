<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Campaign', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'target_age_start',
            'target_age_end',
            'target_sex',
            // 'target_provcode',
            // 'target_distcode',
            // 'target_subdistcode',
            // 'target_hospcode',
            // 'target_chronic',
            // 'detail_url:url',
            // 'thumbnail_url:url',
            // 'intro:ntext',
            // 'startdate',
            // 'enddate',
            // 'userid',
            // 'publisher_id',
            // 'publisher_url:url',
            // 'hotline_number',
            // 'redirect2publisher',
            // 'full_detail:ntext',
            // 'publish',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
