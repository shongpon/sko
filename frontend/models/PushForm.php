<?php
namespace frontend\models;

use Yii;
use yii\base\model;
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
* 
*/
class PushForm extends Model
{
	public $sex;
	public $age;
	public $provcode;
	public $distcode;
	public $subdistcode;
	public $hoscode;
	public $msg;

	
	public function rules()
	{
        return [
            ['sex', 'required'],
            ['age', 'number'],
            ['provcode', 'string'],
            ['distcode', 'string'],
            ['subdistcode', 'string'],
            ['hoscode', 'string'],
            ['msg', 'required'],

        ];
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


		$data = array("alert" => $this->msg);


		// Push to Query
		$age_int = (int) $this->age;

		$query = ParseInstallation::query();
		if ($age_int > 0) {
			$query->equalTo("age", $age_int);
		} 


		if ($this->sex != '0' && $this->sex != 'all') {
			$query->equalTo("sex", $this->sex);
		} 

		if ($this->sex == '0' & $this->age == 0) {
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



?>