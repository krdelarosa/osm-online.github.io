<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Tenant extends ActiveRecord{
    public $tenant_id;
    public $tenant_fname, $tenant_mname, $tenant_lname, $tenant_suffix;
    public $tenant_phone;
    public $tenant_email;
    public $tenant_nationality;
    public $tenant_status;
    public $tenant_institution;
    public $ec_fname, $ec_mname, $ec_lname, $ec_suffix;
    public $ec_phone;

    public function rules(){
        return [ [['t_fname','t_mname','t_lname','t_status'],'required'] ];
    }

    

}

?>