<?php
$this->title = 'A2 ICD ที่ให้กับผู้ป่วยหญิงเท่านั้น';
$this->params['breadcrumbs'][] = $this->title;

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\frontend;
//echo var_dump($dataProvider); 
?>
<div class="row">
    <b>เงื่อนไข : A1</b>
    <p class="lead"><strong>รหัส ICD ที่ให้กับผู้ป่วยหญิงเท่านั้น</strong> <small>ได้แก่ รหัส A34,B37.3,C51-C58,C79.6,D06.-,D07.0-D07.3,D25-D28,D39.-,E28.-,E89.4,F52.5,F53.-,I86.3,L29.2,L70.5,
    M80.0-M80.1,M81.0-M81.1,M83.0,N70-N98,N99.2-N99.3,O00-O99,P54.6,Q50-Q52,R87,S31.4,S37.4-S37.6,T19.2-T19.3,T83.3,Y76.-,Z01.4,Z12.4,Z30.1,Z30.3,Z30.5,Z31.1,
    Z31.2,Z32-Z36,Z39.-,Z43.7,Z87.5,Z97.5</small></p>
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">เลือกปี</h3>
            </div>
            <div class="panel-body">
                <?= Html::beginForm();?>
                <?= Html::dropDownList('year',null,['2015'=>'2558','2014'=>'2557','2013'=>'2556'],['class'=>'form-control']);?>
                <?= Html::submitButton('ค้นหา',['class'=>'0']);?>
                <?= Html::endForm();?>
            </div>
        </div>
         <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'panel'=>[
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการให้รหัส ICD ที่ให้กับผู้ป่วยหญิงเท่านั้น แยกรายสถานบริการ</h3>'],
            'responsive'=>true,
           
           
            'columns' => [
                //['class'=>'yii\grid\SerialColumn'],
                 [
                    'label' => 'รหัสหน่วยบริการ',
                    'attribute' => 'hospcode'
                ],
                 [
                    'label' => 'หน่วยบริการ',
                    'attribute' => 'hosname'
                ],
                 [
                    'label' => 'จำนวนที่ผิดพลาด',
                    'attribute' => 'false_diag'
                ],
                [
                    'label' => 'จำนวนทั้งหมด',
                    'attribute' => 'total_diag'
                ],
                [
                    'label' => 'ร้อยละ',
                    'attribute' => 'percent'
                ],
                
               
            ]
            
        ]);
        ?>
    </div>
</div>

