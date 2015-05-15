<?php
$this->title = 'B8 ห้ามใช้รหัส T31.0-T31.9 เป็นรหัสโรคหลัก ';
$this->params['breadcrumbs'][] = $this->title;

use kartik\grid\GridView;
use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\frontend;
//echo var_dump($dataProvider); 
?>
<div class="row">
    <b>เงื่อนไข : B8</b>
    <p class="lead"> <strong>ห้ามใช้รหัส T31.0-T31.9</strong> <small>ซึ่งเป็นรหัสบอกเปอร์เซ็นการเกิดแผลไฟไหม้เป็นรหัสโรคหลัก</small></p>
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการให้รหัส T31.0-T31.9 แยกรายสถานบริการ</h3>'],
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


