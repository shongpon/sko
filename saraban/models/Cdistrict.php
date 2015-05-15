<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cdistrict".
 *
 * @property integer $district_id
 * @property string $distid
 * @property string $distname
 * @property integer $geo_id
 * @property string $provid
 * @property string $last_update
 */
class Cdistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cdistrict';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['distid', 'distname'], 'required'],
            [['geo_id'], 'integer'],
            [['last_update'], 'safe'],
            [['distid'], 'string', 'max' => 4],
            [['distname'], 'string', 'max' => 30],
            [['provid'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'district_id' => 'District ID',
            'distid' => 'Distid',
            'distname' => 'Distname',
            'geo_id' => 'Geo ID',
            'provid' => 'Provid',
            'last_update' => 'Last Update',
        ];
    }
}
