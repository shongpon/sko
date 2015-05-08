<?php

use yii\helpers\Html;
use yii\grid\GridView;
use miloschuman\highcharts\Highcharts;
use app\models\RepChildDevR6;

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

            //'id',
            'title',
            //'target_age_start',
            //'target_age_end',
            //'target_sex',
            // 'target_provcode',
            // 'target_distcode',
            // 'target_subdistcode',
            // 'target_hospcode',
            // 'target_chronic',
            // 'detail_url:url',
            // 'thumbnail_url:url',
            // 'intro:ntext',
             'startdate',
             'enddate',
            // 'userid',
             'publisher_id',
            // 'publisher_url:url',
            // 'hotline_number',
            // 'redirect2publisher',
            // 'full_detail:ntext',
            // 'publish',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

<?php


$sql = "
SELECT
ROUND(IFNULL(SUM(if(r.areacode LIKE '11%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '11%', r.total_targer, 0)) ,0),2) AS p11,
ROUND(IFNULL(SUM(if(r.areacode LIKE '20%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '20%', r.total_targer, 0)) ,0),2) AS p20,
ROUND(IFNULL(SUM(if(r.areacode LIKE '21%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '21%', r.total_targer, 0)) ,0),2) AS p21,
ROUND(IFNULL(SUM(if(r.areacode LIKE '22%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '22%', r.total_targer, 0)) ,0),2) AS p22,
ROUND(IFNULL(SUM(if(r.areacode LIKE '23%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '23%', r.total_targer, 0)) ,0),2) AS p23,
ROUND(IFNULL(SUM(if(r.areacode LIKE '24%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '24%', r.total_targer, 0)) ,0),2) AS p24,
ROUND(IFNULL(SUM(if(r.areacode LIKE '25%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '25%', r.total_targer, 0)) ,0),2) AS p25,
ROUND(IFNULL(SUM(if(r.areacode LIKE '27%', r.total_result, 0)) * 100 / SUM(if(r.areacode LIKE '27%', r.total_targer, 0)) ,0),2) AS p27
FROM
rep_child_dev_r6 r
GROUP BY
r.age_month
ORDER BY
r.age_month
";
$rep = RepChildDevR6::findBySql($sql)->asArray()->all();



// echo '<br>'.implode(',', $rep[0]);
// echo '<br>'.implode(',', $rep[1]);
// echo '<br>'.implode(',', $rep[2]);
// echo '<br>'.implode(',', $rep[3]);

// $value=var_dump(array_map('intVal', array_values($rep[0])));
                        
// echo print_r($value);  

echo Highcharts::widget([
'scripts' => array(
      'highcharts-more',   // enables supplementary chart types (gauge, arearange, columnrange, etc.)
      'modules/exporting', // adds Exporting button/menu to chart
      //'themes/grid-light'        // applies global 'grid' theme to all charts
    ),
    'options' => array(
      'title' => array('text' => 'ร้อยละของเด็กที่มีพัฒนาการสมวัยตามช่วงอายุ 0-5 ปี เขตบริการสุขภาพที่ 6'),
      'xAxis' => array(
         'categories' => array('สมุทรปราการ','ชลบุรี','ระยอง','จันทบุรี','ตราด','ฉะเชิงเทรา','ปราจีนบุรี','สระแก้ว')
      ),
      'yAxis' => array(
         'title' => array('text' => 'ร้อยละของเด็กที่มีพัฒนาการสมวัย')
      ),
      'colors'=>array('#2D7EC8', '#21A7DA', '#29D1D9', '#2FD1A5'),
      'gradient' => array('enabled'=> true),
      'credits' => array('enabled' => false),
      /*'exporting' => array('enabled' => false),*/ //to turn off exporting uncomment
      'chart' => array(
        'plotBackgroundColor' => '#ffffff',
        'plotBorderWidth' => null,
        'plotShadow' => false,
        'height' => 400,

      ),
      'title' => false,
       'series' => array(
            array('type'=>'column','name' => 'อายุ 9 เดือน', 'pointPadding'=>0, 'borderWidth'=>1, 'data' =>  array_map('floatval', array_values($rep[0])) ),
            array('type'=>'column','name' => 'อายุ 18 เดือน', 'pointPadding'=>0, 'borderWidth'=>1, 'data' => array_map('floatval', array_values($rep[1])) ),
            array('type'=>'column','name' => 'อายุ 30 เดือน', 'pointPadding'=>0, 'borderWidth'=>1, 'data' => array_map('floatval', array_values($rep[2])) ),
            array('type'=>'column','name' => 'อายุ 42 เดือน', 'pointPadding'=>0, 'borderWidth'=>1, 'data' => array_map('floatval', array_values($rep[3])) ),

      ),
    )
]);
?>

