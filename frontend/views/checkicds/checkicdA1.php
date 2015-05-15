<?php
$this->title = 'A1 ICD ที่ให้กับผู้ป่วยชายเท่านั้น';
$this->params['breadcrumbs'][] = $this->title;

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\frontend;


//echo var_dump($dataProvider); 
?>
<div class="row">
    <b>เงื่อนไข : A1</b>
    <p class="lead"><strong>รหัส ICD ที่ให้กับผู้ป่วยชายเท่านั้น</strong> <small>ได้แก รหัส B26.0,C60-C63,D07.4-D07.6,D29-D40,E29-E89.5,F52.4,I86.1,L29.1,N40-N51,Q53-Q55,R86,S31.2-S31.3,Z12.5</small></p>
   
    
    <div class="col-md-12" >
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
             //'options'=>['class'=>'table-responsive','id'=>'a1table'], ทำ responsive ตาราง
            'panel'=>[
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการให้รหัส ICD ที่ให้กับผู้ป่วยชายเท่านั้น แยกรายสถานบริการ</h3>'],
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

