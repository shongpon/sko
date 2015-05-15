
<?php
$this->title = 'รายงานการคุมกำเนิด FP';
$this->params['breadcrumbs'][] = $this->title;

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
//echo var_dump($dataProvider); 
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <h3 class="panel-title glyphicon glyphicon-edit"> เลือกปี</h3>
            </div>
            <div class="panel-body">
                <?= Html::beginForm();?>
                <?= Html::dropDownList('year',null,['20151001'=>'2558','20141001'=>'2557','20131001'=>'2556'],['class'=>'form-control']);?>
                <?= Html::submitButton('ค้นหา',['class'=>'btn btn-info']);?>
                <?= Html::endForm();?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
         <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel' => [
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการคุมกำเนิดแยกรายอำเภอ</h3>'],
            'responsive'=>true,//ทำ responsive ตาราง
           
            
            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'อำเภอ',
                    'attribute' => 'distname'
                ],
                 [
                    'label' => 'รวม',
                    'attribute' => 'total'
                ],
                [
                    'label' => 'ยาเม็ด',
                    'attribute' => 'fp1'
                ],
                [
                    'label' => 'ยาฉีด',
                    'attribute' => 'fp2'
                ],
                [
                    'label' => 'ห่วงอนามัย',
                    'attribute' => 'fp3'
                ],
                [
                    'label' => 'ยาฝัง',
                    'attribute' => 'fp4',
//                    'format' => ['decimal', 4] กำหนดจำนวนจุดทศนิยม
                ],
                [
                    'label' => 'ถุงยาอนามัย',
                    'attribute' => 'fp5',
                    
                ],
                [
                    'label' => 'หมันชาย',
                    'attribute' => 'fp6',
                    
                ],
                [
                    'label' => 'หมันหญิง',
                    'attribute' => 'fp7',
                    
                ],
            ]
        ]);
        ?>
    </div>
</div>
