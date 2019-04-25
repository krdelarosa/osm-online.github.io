<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Owner extends Model{
    
    public $owner_fname, $owner_mname, $owner_lname, $owner_suffix;
    public $owner_phone;
    public $owner_email;
    public $ec_fname, $ec_mname, $ec_lname, $ec_suffix;
    public $ec_phone;

    public function getOwnerID(){
        return $manager_id;
    }

    public function getOwnerName(){
        return [$owner_fname, $owner_mname, $owner_lname, $owner_suffix];
    }

    public function getOwnerContact(){
        return [$owner_phone,$owner_email];
    }

    public function getEmergencyContact(){
        return [$ec_fname, $ec_mname, $ec_lname, $ec_suffix, $ec_phone];
    }
}

?>