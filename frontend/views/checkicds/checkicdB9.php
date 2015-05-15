<?php
$this->title = 'B9 การให้รหัส V00-Y34 ';
$this->params['breadcrumbs'][] = $this->title;


use miloschuman\highcharts\Highcharts;
use yii\helpers\Html;
use yii\frontend;
use kartik\grid\GridView;
//echo var_dump($dataProvider); 
?>
<div class="row">
    <b>เงื่อนไข : B9</b>
    <p class="lead"> <strong>การให้รหัส V00-Y34</strong> <small>ต้องให้รหัสรวม 5 ตัวอักษรเสมอ</small></p>
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
                'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> รายงานการให้รหัส V00-Y34 แยกรายสถานบริการ</h3>'],
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
    <div class="col-md-12">
        
        <?php
        echo Highcharts::widget([
            
   'options' => [
      'title' => ['text' => 'อัตราการให้รหัส V00-Y34 แยกรายสถานบริการ'],
      'xAxis' => [//แกน X
         'categories' => $hosname
      ],
      'yAxis' => [//แกน Y
         'title' => ['text' => 'อัตรา']
      ],
      'series' => [
        ['type' =>'column',//รูปแบบกราฟ
         'name' => 'ร้อยละ', 'data' => $percent],
        
      ]
   ]
]);
        ?>
    </div>
</div>


