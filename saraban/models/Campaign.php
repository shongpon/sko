<?php

namespace app\models;

use Yii;
require 'autoload.php';

use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseACL;
use Parse\ParsePush;
use Parse\ParseUser;
use Parse\ParseInstallation;
use Parse\ParseException;
use Parse\ParseAnalytics;
use Parse\ParseFile;
use Parse\ParseCloud;
use Parse\ParseClient;


/**
 * This is the model class for table "campaign".
 *
 * @property integer $id
 * @property string $title
 * @property integer $target_age_start
 * @property integer $target_age_end
 * @property string $target_sex
 * @property string $target_provcode
 * @property string $target_distcode
 * @property string $target_subdistcode
 * @property string $target_hospcode
 * @property string $target_chronic
 * @property string $detail_url
 * @property string $thumbnail_url
 * @property string $intro
 * @property string $startdate
 * @property string $enddate
 * @property string $userid
 * @property string $publisher_id
 * @property string $publisher_url
 * @property string $hotline_number
 * @property integer $redirect2publisher
 * @property string $full_detail
 * @property integer $publish
 */
class Campaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'thumbnail_url', 'intro', 'redirect2publisher', 'startdate', 'enddate', 'publish'], 'required'],
            [['target_age_start', 'target_age_end', 'redirect2publisher', 'publish'], 'integer'],
            [['intro', 'full_detail'], 'string'],
            [['startdate', 'enddate'], 'date', 'format' => 'yyyy-mm-dd'],
            [['title', 'detail_url', 'thumbnail_url', 'publisher_id', 'publisher_url'], 'string', 'max' => 255],
            [['target_sex'], 'string', 'max' => 1],
            [['target_provcode'], 'string', 'max' => 2],
            [['target_distcode'], 'string', 'max' => 4],
            [['target_subdistcode'], 'string', 'max' => 6],
            [['target_hospcode'], 'string', 'max' => 5],
            [['userid', 'hotline_number'], 'string', 'max' => 50],
            [['target_chronic'], function ($attribute, $params) {
                if(!is_array($this->target_chronic)){
                    $this->addError('target_chronic','target_chronic is not array!');
                }
            }],
        ];
        //, 'target_age_start', 'target_age_end', 'target_sex', 'target_provcode', 'target_distcode', 'target_subdistcode', 'target_hospcode', 'target_chronic', 'detail_url', 'userid', 'publisher_id', 'publisher_url', 'hotline_number', 'full_detail'
    }
//, 'format' => 'yyyy-mm-dd'
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อแคมเปญสุขภาพ/โครงการ',
            'target_age_start' => 'อายุ',
            'target_age_end' => 'ถึง',
            'target_sex' => 'เพศ',
            'target_provcode' => 'จังหวัด',
            'target_distcode' => 'อำเภอ',
            'target_subdistcode' => 'ตำบล',
            'target_hospcode' => 'หน่วยบริการ',
            'target_chronic' => 'โรคเรื้อรัง',
            'detail_url' => 'Url รายละเอียดแคมเปญ/โครงการ',
            'thumbnail_url' => 'Thumbnail Url',
            'intro' => 'Intro',
            'startdate' => 'วันเริ่มต้นโครงการ',
            'enddate' => 'วันสิ้นสุดโครงการ',
            'userid' => 'Userid',
            'publisher_id' => 'หน่วยงานผู้รับผิดชอบ',
            'publisher_url' => 'URL เว็บไซต์หน่วยงาน',
            'hotline_number' => 'หมายเลขโทรศัพท์',
            'redirect2publisher' => 'Redirect2publisher',
            'full_detail' => 'Full Detail',
            'publish' => 'การเผยแพร่',
        ];
    }



    public function beforeSave($insert)
    {       
        if ($this->target_chronic) {
            $target_chronics = implode(',', $this->target_chronic);
            $this->target_chronic = $target_chronics;
        }


        return parent::beforeSave($insert);
    }


    public function sendPush()
    {
        // $user = $this->_user;
        // $user->setPassword($this->password);
        // $user->removePasswordResetToken();

        // return $user->save();

        $app_id = "IOV4Xi43voVoN39NcBCJuLe0WzCw01NhrhHRbihX";
        $rest_key = "eIcbsG82Nj3OnFqkaMXCkOftjuHEchihEBPRpaor";
        $master_key = "H7tBq35teGtFP417gNtPnmAL1RJTYkEevDXjicDv";

        ParseClient::initialize( $app_id, $rest_key, $master_key );


        $data = array("alert" => $this->title);


        // Push to Query
        $agestart_int = (int) $this->target_age_start;
        $ageend_int = (int) $this->target_age_end;

        $query = ParseInstallation::query();
        if ($agestart_int > 0) {
            if ($agestart_int == $ageend_int) {
                $query->equalTo("age", $agestart_int);
            } else {
                $query->greaterThanOrEqualTo("age", $agestart_int);
                $query->lessThanOrEqualTo("age", $ageend_int);
            }
            
        } 


        if ($this->target_sex != '0' && $this->target_sex != 'all') {
            if ($this->target_sex == '1') {
                $query->equalTo("sex", 'male');
            } else {
                $query->equalTo("sex", 'female');
            }
            
        } 

        if ($this->target_sex == '0' && $this->target_age_start <= 0) {
            ParsePush::send(array(
                "channels" => [""],
                "data" => $data
            ));
        } else {
            ParsePush::send(array(
                "where" => $query,
                "data" => $data
            ));
        }

        return true;

    }

}
