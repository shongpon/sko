<?php
namespace frontend\controllers;
use yii;
use yii\web\controller;
use yii\data\ArrayDataProvider;
use yii\db\Query;


class QueryController extends Controller{
    public function actionQuerys(){
        return $this->render('querys');
    }
    
    public function actionQueryfp(){
        $connection = Yii::$app->db;
        $year_rep =2015;
        $queryfp = $connection->createCommand("
                

SELECT 
d.distid,
d.distname,
COUNT(DISTINCT fp.HOSPCODE,fp.PID,fp.FPTYPE) total,
COUNT(DISTINCT IF(fp.FPTYPE = '3',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp3,
COUNT(DISTINCT IF(fp.FPTYPE = '1',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp1,
COUNT(DISTINCT IF(fp.FPTYPE = '7',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp7,
COUNT(DISTINCT IF(fp.FPTYPE = '6',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp6,
COUNT(DISTINCT IF(fp.FPTYPE = '2',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp2,
COUNT(DISTINCT IF(fp.FPTYPE = '4',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp4,
COUNT(DISTINCT IF(fp.FPTYPE = '5',CONCAT(fp.HOSPCODE,fp.PID),NULL)) fp5
FROM
fp
Inner Join co_office ON fp.HOSPCODE = co_office.off_id
Left Join co_district d ON co_office.distid = d.distid
WHERE
fp.DATE_SERV BETWEEN CONCAT($year_rep,'-01-01') AND CONCAT($year_rep,'-12-31')
GROUP BY
 co_office.distid 
ORDER BY 
co_office.distid")->queryAll();
        for($i=0;$i<sizeof($queryfp);$i++){
            $fp1[] = $queryfp[$i]['fp1'];
            $fp2[] = $queryfp[$i]['fp2'];
            $fp3[] = $queryfp[$i]['fp3'];
            $fp4[] = $queryfp[$i]['fp4'];
            $fp5[] = $queryfp[$i]['fp5'];
            $fp6[] = $queryfp[$i]['fp6'];
            $fp7[] = $queryfp[$i]['fp7'];
        }
        $dataProvider = new ArrayDataProvider([
                'allModels'=>$queryfp,
                'sort'=>['attributes'=>['distname','total','fp1','fp2','fp3','fp4','fp5','fp6','fp7']
                    ],
        ]);
        return $this->render('queryfp',[
            'dataProvider'=>$dataProvider,
            'fp1'=>$fp1,
            'fp2'=>$fp2,
            'fp3'=>$fp3,
            'fp4'=>$fp4,
            'fp5'=>$fp5,
            'fp6'=>$fp6,
            'fp7'=>$fp7
                ]);
    }
    
    
}

