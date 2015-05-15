<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use app\models\LoginForm;


class MapController extends controller{
    
public function actionMap()
    {
        return $this->render('map');
    }
}
