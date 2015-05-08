<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rep_child_dev_r6".
 *
 * @property string $hospcode
 * @property integer $age_month
 * @property string $gov_year
 * @property string $areacode
 * @property integer $total_targer
 * @property integer $total_result
 * @property integer $q1_targer
 * @property integer $q1_result
 * @property integer $q1_low_weight
 * @property integer $q1_asphyxia
 * @property integer $q2_targer
 * @property integer $q2_result
 * @property integer $q2_low_weight
 * @property integer $q2_asphyxia
 * @property integer $q3_targer
 * @property integer $q3_result
 * @property integer $q3_low_weight
 * @property integer $q3_asphyxia
 * @property integer $q4_targer
 * @property integer $q4_result
 * @property integer $q4_low_weight
 * @property integer $q4_asphyxia
 */
class RepChildDevR6 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rep_child_dev_r6';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db_sko');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hospcode', 'age_month', 'gov_year'], 'required'],
            [['age_month', 'total_targer', 'total_result', 'q1_targer', 'q1_result', 'q1_low_weight', 'q1_asphyxia', 'q2_targer', 'q2_result', 'q2_low_weight', 'q2_asphyxia', 'q3_targer', 'q3_result', 'q3_low_weight', 'q3_asphyxia', 'q4_targer', 'q4_result', 'q4_low_weight', 'q4_asphyxia'], 'integer'],
            [['hospcode'], 'string', 'max' => 5],
            [['gov_year'], 'string', 'max' => 4],
            [['areacode'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hospcode' => 'Hospcode',
            'age_month' => 'Age Month',
            'gov_year' => 'Gov Year',
            'areacode' => 'Areacode',
            'total_targer' => 'Total Targer',
            'total_result' => 'Total Result',
            'q1_targer' => 'Q1 Targer',
            'q1_result' => 'Q1 Result',
            'q1_low_weight' => 'Q1 Low Weight',
            'q1_asphyxia' => 'Q1 Asphyxia',
            'q2_targer' => 'Q2 Targer',
            'q2_result' => 'Q2 Result',
            'q2_low_weight' => 'Q2 Low Weight',
            'q2_asphyxia' => 'Q2 Asphyxia',
            'q3_targer' => 'Q3 Targer',
            'q3_result' => 'Q3 Result',
            'q3_low_weight' => 'Q3 Low Weight',
            'q3_asphyxia' => 'Q3 Asphyxia',
            'q4_targer' => 'Q4 Targer',
            'q4_result' => 'Q4 Result',
            'q4_low_weight' => 'Q4 Low Weight',
            'q4_asphyxia' => 'Q4 Asphyxia',
        ];
    }
}
