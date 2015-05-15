<?php
namespace frontend\controllers;
use yii\web\Controller;
use yii\db\Query;
use yii\data\ArrayDataProvider;
use \app\models\Query;

claSS ReportControllers extends Controller{
    
public function actionReportFP(){
       $connection = Yii::$app->db;
        $data = $connection->createCommand('
                SELECT
                Count(FP.PID) as tpid,
                CH.PROVCODE as pro,
                CH.DISTCODE as dis
                FROM
                CHOSPCODE CH
                LEFT JOIN FP ON fp.HOSPCODE = CH.HOSPCODE
                WHERE CH.PROVCODE = 27
                AND FP.FPTYPE IN (1,2,3,4,5,6,7)
                AND FP.DATE_SERV BETWEEN 20131001 and 20140930
                GROUP BY CH.DISTCODE')
                ->queryAll();
       for($i=0;$i<sizeof($data);$i++){
            $pro[] = $data[$i]['pro'];
            $dis[] = $data[$i]['dis'];
            $tpid[] = $data[$i]['tpid'];
        }
       
        $dataProvider = new ArrayDataProvider(['allModels'=>$data
               ,'sort'=>[
                    'attributes'=>['pro','dis','tpid']
                  
            ]]);
      return $this->render('reportFP',['dataProvider'=>$dataProvider
              ,'pro'=>$pro,'dis'=>$dis,'tpid'=>$tpid
              ]);
     
     
    }
       
   
}
