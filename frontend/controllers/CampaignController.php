<?php

namespace frontend\controllers;

use Yii;
use app\models\Campaign;
use app\models\CampaignSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Cdistrict;
use app\models\Csubdistrict;
use yii\helpers\Json;

/**
 * CampaignController implements the CRUD actions for Campaign model.
 */
class CampaignController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['create', 'update'],
                'rules' => [
                    // deny all POST requests
                    [
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }


    /**
     * Lists all Campaign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampaignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Campaign model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Campaign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Campaign();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if ($model->sendPush()) {
                Yii::$app->getSession()->setFlash('success', 'Message has been send.');

                // do something meaningful here about $model ...

            } else {
                // either the page is initially displayed or there is some validation error
                // $model->age = 0;
                // $model->sex = 'all';
                Yii::$app->getSession()->setFlash('error', 'Error.');
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->userid = Yii::$app->user->id;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Campaign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            // if ($model->target_chronic) {

            //         $model->target_chronic = explode(',', $model->target_chronic);

                
            // }

            if (!is_array($model->target_chronic)) {
                $pos = strpos($model->target_chronic, ',');

                if (!$pos === false) {
                    $model->target_chronic = explode(',', $model->target_chronic);
                }
                
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Campaign model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Campaign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campaign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campaign::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


    public function actionDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $out = Cdistrict::find()
                        ->where(['and', "provid=$cat_id", "geo_id<>0"])
                        ->orderBy('id')
                        ->select(['distid AS id','distname AS name' ])->asArray()->all();

                
                //self::getSubCatList($cat_id); 
                // the getSubCatList function will query the database based on the
                // cat_id and return an array like below:
                // [
                //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
                //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
                // ]


                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0]; // get the value of model_id1
                    echo Json::encode(['output' => $out, 'selected'=>$selected]);
                } else {
                    echo Json::encode(['output'=>$out, 'selected'=>'']);
                }
                
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }


     
    public function actionSubdistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $cat_id = empty($ids[0]) ? null : $ids[0];
            $subcat_id = empty($ids[1]) ? null : $ids[1];
            if ($cat_id != null) {
               $data = Csubdistrict::find()
                        ->where(['ampurcode'=>$cat_id])
                        ->select(['tamboncodefull AS id','tambonname AS name' ])->asArray()->all();
                /**
                 * the getProdList function will query the database based on the
                 * cat_id and sub_cat_id and return an array like below:
                 *  [
                 *      'out'=>[
                 *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
                 *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
                 *       ],
                 *       'selected'=>'<prod-id-1>'
                 *  ]
                 */

                if (!empty($_POST['depdrop_params'])) {
                    $params = $_POST['depdrop_params'];
                    $selected = $params[0]; // get the value of model_id1
                    echo Json::encode(['output'=>$data, 'selected'=>'2702']);
                } else {
                    echo Json::encode(['output'=>$data, 'selected'=>'']);
                }

               
               return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
}
