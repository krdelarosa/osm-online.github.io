<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Manager extends Model{

    public $manager_id;
    public $manager_fname, $manager_mname, $manager_lname, $manager_suffix;
    public $manager_phone;
    public $manager_email;
    public $manager_type; #owner or manager
    public $ec_fname, $ec_mname, $ec_lname, $ec_suffix;
    public $ec_phone;

    public function getManagerID(){
        return $manager_id;
    }

    public function getManagerName(){
        return [$manager_fname, $manager_mname, $manager_lname, $manager_suffix];
    }

    public function getManagerContact(){
        return [$manager_phone,$manager_email];
    }

    public function getEmergencyContact(){
        return [$ec_fname, $ec_mname, $ec_lname, $ec_suffix, $ec_phone];
    }
}

?>

