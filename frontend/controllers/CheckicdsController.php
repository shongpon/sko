<?php

namespace frontend\controllers;
use yii;
use yii\web\controller;
use yii\data\ArrayDataProvider;
use yii\db\Query;



class CheckicdsController extends Controller{
    
    public function actionCheckicds(){
        return $this->render('Checkicds');
    }
    
    
    public function actionCheckicda1(){
        $connection = Yii::$app->db2;
        
        $querya1 = $connection->createCommand("
            SELECT
            a1.diag_year,
            a1.hospcode,
            a1.hosname,
            a1.false_diag,
            a1.total_diag,
            a1.percent,
            a1.district,
            a1.province
            FROM a1
            WHERE a1.diag_year = 2015
            ORDER BY a1.false_diag DESC;
        ")->queryAll();
        for($i=0;$i<sizeof($querya1);$i++){
            $diag_year[] = $querya1[$i]['year'];
            $hospcode[] = $querya1[$i]['hospcode'];
            $hosname[] = $querya1[$i]['hosname'];
            $false_diag[] = $querya1[$i]['false_diag'];
            $total_diag[] = $querya1[$i]['total_diag'];
            $percent[] = $querya1[$i]['percent'];
        }
        
        $dataProvider = new ArrayDataProvider(['allModels'=>$querya1
                ,'sort'=>['attributes'=>['year','hospcode','hosname','false_diag','total_diag','percent']],
                ]);
        
        return $this->render('checkicda1',['dataProvider'=>$dataProvider] );
    }  
    public function actionCheckicda2(){
        $connection = Yii::$app->db2;
        
        $querya1 = $connection->createCommand("
            SELECT
            a1.diag_year,
            a1.hospcode,
            a1.hosname,
            a1.false_diag,
            a1.total_diag,
            a1.percent,
            a1.district,
            a1.province
            FROM a1
            WHERE a1.diag_year = 2015
            ORDER BY a1.false_diag DESC;
        ")->queryAll();
        for($i=0;$i<sizeof($querya1);$i++){
            $diag_year[] = $querya1[$i]['year'];
            $hospcode[] = $querya1[$i]['hospcode'];
            $hosname[] = $querya1[$i]['hosname'];
            $false_diag[] = $querya1[$i]['false_diag'];
            $total_diag[] = $querya1[$i]['total_diag'];
            $percent[] = $querya1[$i]['percent'];
        }
        
        $dataProvider = new ArrayDataProvider(['allModels'=>$querya1
                ,'sort'=>['attributes'=>['year','hospcode','hosname','false_diag','total_diag','percent']],
                ]);
        
        return $this->render('checkicda2',['dataProvider'=>$dataProvider] );
    }  
    
    public function actionCheckicdb3(){
        $connection = Yii::$app->db2;
        
        $querya1 = $connection->createCommand("
            SELECT
            b3.diag_year,
            b3.hospcode,
            b3.hosname,
            b3.false_diag,
            b3.total_diag,
            b3.percent,
            b3.district,
            b3.province
            FROM b3
            WHERE b3.diag_year =2015;
        ")->queryAll();
        for($i=0;$i<sizeof($querya1);$i++){
            $diag_year[] = $querya1[$i]['year'];
            $hospcode[] = $querya1[$i]['hospcode'];
            $hosname[] = $querya1[$i]['hosname'];
            $false_diag[] = $querya1[$i]['false_diag'];
            $total_diag[] = $querya1[$i]['total_diag'];
            $percent[] = $querya1[$i]['percent'];
        }
        
        $dataProvider = new ArrayDataProvider(['allModels'=>$querya1
                ,'sort'=>['attributes'=>['year','hospcode','hosname','false_diag','total_diag','percent']],
                ]);
        
        return $this->render('checkicdb3',['dataProvider'=>$dataProvider] );
    }
    public function actionCheckicdb9(){
        $connection = Yii::$app->db2;
        
        $querya1 = $connection->createCommand("  
            SELECT
            b9.diag_year,
            b9.hospcode,
            b9.hosname,
            b9.false_diag,
            b9.total_diag,
            b9.percent,
            b9.district,
            b9.province
            FROM b9
            WHERE b9.diag_year = 2015
            ORDER BY b9.false_diag DESC;
        ")->queryAll();
        for($i=0;$i<sizeof($querya1);$i++){
            $diag_year[] = $querya1[$i]['year'];
            $hospcode[] = $querya1[$i]['hospcode'];
            $hosname[] = $querya1[$i]['hosname'];
            $false_diag[] = $querya1[$i]['false_diag'];
            $total_diag[] = $querya1[$i]['total_diag'];
            $percent[] = $querya1[$i]['percent']*1;
        }
        
        $dataProvider = new ArrayDataProvider(['allModels'=>$querya1
                ,'sort'=>['attributes'=>['year','hospcode','hosname','false_diag','total_diag','percent']],
                ]);
        
        return $this->render('checkicdb9',['dataProvider'=>$dataProvider,
                                'hosname'=>$hosname,'percent'=>$percent] );
    }
    public function actionCheckicdb8(){
        $connection = Yii::$app->db2;
        
        $querya1 = $connection->createCommand("  
            SELECT
            b8.diag_year,
            b8.hospcode,
            b8.hosname,
            b8.false_diag,
            b8.total_diag,
            b8.percent,
            b8.district,
            b8.province
            FROM b8
            WHERE b8.diag_year = 2015
            ORDER BY b8.false_diag DESC;
        ")->queryAll();
        for($i=0;$i<sizeof($querya1);$i++){
            $diag_year[] = $querya1[$i]['year'];
            $hospcode[] = $querya1[$i]['hospcode'];
            $hosname[] = $querya1[$i]['hosname'];
            $false_diag[] = $querya1[$i]['false_diag'];
            $total_diag[] = $querya1[$i]['total_diag'];
            $percent[] = $querya1[$i]['percent'];
        }
        
        $dataProvider = new ArrayDataProvider(['allModels'=>$querya1
                ,'sort'=>['attributes'=>['year','hospcode','hosname','false_diag','total_diag','percent']],
                ]);
        
        return $this->render('checkicdb8',['dataProvider'=>$dataProvider] );
    }
    
    public function actionCheckicdc1(){
        $connection = Yii::$app->db2;
        
        $querya1 = $connection->createCommand("
            SELECT
            c1.diag_year,
            c1.hospcode,
            c1.hosname,
            c1.false_diag,
            c1.total_diag,
            c1.percent,
            c1.district,
            c1.province
            FROM c1
            WHERE c1.diag_year = 2015
            ORDER BY c1.false_diag DESC;
        ")->queryAll();
        for($i=0;$i<sizeof($querya1);$i++){
            $diag_year[] = $querya1[$i]['year'];
            $hospcode[] = $querya1[$i]['hospcode'];
            $hosname[] = $querya1[$i]['hosname'];
            $false_diag[] = $querya1[$i]['false_diag'];
            $total_diag[] = $querya1[$i]['total_diag'];
            $percent[] = $querya1[$i]['percent'];
        }
        
        $dataProvider = new ArrayDataProvider(['allModels'=>$querya1
                ,'sort'=>['attributes'=>['year','hospcode','hosname','false_diag','total_diag','percent']],
                ]);
        
        return $this->render('checkicdc1',['dataProvider'=>$dataProvider] );
    }
    
}
