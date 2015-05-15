<?php
Yii::$app->db->open();
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Sakaeo Moph CheckICD</h1>
        <p></p>
        <h4>การตรวจสอบและควบคุมคุณภาพข้อมูลในระบบบริการสุขภาพ ด้านการบันทึกข้อมูลผู้มารับบริการและการให้รหัส ICD</h4>
        <div class="jumbotron">    
         <div class="row">   
        
          <div class="col-lg-4 "><?= Html::a('A1<br>รหัสใช้กับ ชาย เท่านั้น', ['/checkicds/checkicda1'], ['class'=>'btn btn-lg btn-success']);?></div>
          <div class="col-lg-4 "><?= Html::a('A2<br>รหัสใช้กับ หญิง เท่านั้น', ['/checkicds/checkicda2'], ['class'=>'btn btn-lg btn-success']);?></div>
          <div class="col-lg-4 "><?= Html::a('B3<br>การให้รหัส S และ T', ['/checkicds/checkicdb3'], ['class'=>'btn btn-lg btn-success']);?></div>
         </div>
         <div class="row"> 
          <div class="col-lg-4 "><?= Html::a('B8<br>ห้ามใช้รหัส T31.0-T31.9<br>เป็นรหัสโรคหลัก', ['/checkicds/checkicdb8'], ['class'=>'btn btn-lg btn-success']);?></div>
          <div class="col-lg-4 "><?= Html::a('B9<br>การให้รหัส V00-Y34', ['/checkicds/checkicdb9'], ['class'=>'btn btn-lg btn-success']);?></div>
          <div class="col-lg-4 "><?= Html::a('C1<br>รหัสด้อยคุณภาพ', ['/checkicds/checkicdc1'], ['class'=>'btn btn-lg btn-success']);?></div>
         </div>
        
        
        </div>
        
    </div>
    
    
    
</div>
<?php
        //หมายเหตุ : เงื่อนไขจากหนังสือ "การตรวจสอบและควบคุมคุณภาพข้อมูล ในระบบบริการสุขภาพด้านการบันทึกข้อมูลผู้มารับบริการและการให้รหัส ICD" สำนักนโยบานและยุทธศาสตร์ มีนาคม 2558

?>




