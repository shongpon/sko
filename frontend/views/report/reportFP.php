<div class ="table-responsive">
<?php
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use kartik\grid\GridView;

echo $dataProvider;

GridView::widget([
    'dataProvider'=>$dataProvider, 
    'responsive'=>true,
    'hover'=>true,
    'pjax'=>true,
    'pjaxSettings'=>[
        'neverTimeout'=>true,
        'beforeGrid'=>'',
        'afterGrid'=>'',
        ],
        'showPageSummary' => true,
        'columns'=>[
            [
                'label'=>'จังหวัด',
                'attribute'=>'pro'
            ],
            [
                'label'=>'อำเภอ',
                'attribute'=>'dis'
            ],
            [
                'label'=>'จำนวน',
                'attribute'=>'tpid'
            ]
        ]
    
]);
 
 
?>     
</div>
