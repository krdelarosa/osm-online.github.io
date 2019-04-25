<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Establishment extends Model{

    public $est_id, $est_name;
    public $address_street, $address_brgy, $address_city, $address_province;
    public $bus_permit, $brgy_permit;

    public function getEstablishmentInfo(){
        return [$est_id,$est_name];
    }

    public function getEstablishmentAddress(){
        return [$address_street,$address_brgy,$address_city,$address_province];
    }

    public function getPermits(){
        return [$bus_permit,$brgy_permit];
    }

    public function setEstablishmentInfo($new_est_name){
        this.$est_name = $new_est_name;      
    }

    public function setEstablishmentAddress($new_address){ //should accept array of new address [s,b,c,p]

    }

    public function setPermits($new_permits){ //should accept array for permits[bus,brgy] 

    }
}

?>