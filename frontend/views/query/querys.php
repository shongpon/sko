<?php
Yii::$app->db->open();
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h2>Sakaeo Moph Reports</h2>
        <p></p>
        <div class="jumbotron">    
        <p>
        <?= Html::a('FP<br>การคุมกำเนิด', ['/query/queryfp'], ['class'=>'btn btn-lg btn-success']);?>
        
        </p>
        
        </div>
    </div>
    
    
</div>





