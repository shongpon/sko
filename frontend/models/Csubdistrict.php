<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csubdistrict".
 *
 * @property string $tamboncode
 * @property string $tambonname
 * @property string $tamboncodefull
 * @property string $ampurcode
 * @property string $changwatcode
 * @property string $flag_status
 */
class Csubdistrict extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csubdistrict';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tamboncode', 'tamboncodefull', 'ampurcode', 'changwatcode'], 'required'],
            [['tamboncode', 'changwatcode'], 'string', 'max' => 2],
            [['tambonname'], 'string', 'max' => 255],
            [['tamboncodefull'], 'string', 'max' => 6],
            [['ampurcode'], 'string', 'max' => 4],
            [['flag_status'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tamboncode' => 'Tamboncode',
            'tambonname' => 'Tambonname',
            'tamboncodefull' => 'Tamboncodefull',
            'ampurcode' => 'Ampurcode',
            'changwatcode' => 'Changwatcode',
            'flag_status' => 'Flag Status',
        ];
    }
}
