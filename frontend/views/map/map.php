<?php
use yii\helpers\Html;
use yii\web\Controller;
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;
?>
<div class="lead table-responsiv" >
        <h2>แผนที่</h2>

<?php 

$coord = new LatLng(['Lat' => 13.797949, 'lng' => 102.137420]);
    $map1 = new Map([
        'center' => $coord,
        'zoom' =>9,
        'width' =>'100%',
        'height' =>'600'
        
    ]);
    $Marker = new Marker(['position'=>$coord]);
    $map1->addOverlay($Marker);
     //$Marker->attachInfoWindow(
       //     new InfoWindow([
                
       //     'info'=>'<h4>สำนักงานสาธารณสุขจังหวัดสระแก้ว</h4>']));
   ?>
    </div>
    <?php
    echo $map1->display();
        ?> 

