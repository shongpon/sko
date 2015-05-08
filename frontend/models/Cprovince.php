<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cprovince".
 *
 * @property string $changwatcode
 * @property string $changwatname
 * @property string $zonecode
 */
class Cprovince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cprovince';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['changwatcode'], 'required'],
            [['changwatcode', 'zonecode'], 'string', 'max' => 2],
            [['changwatname'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'changwatcode' => 'Changwatcode',
            'changwatname' => 'Changwatname',
            'zonecode' => 'Zonecode',
        ];
    }
}
