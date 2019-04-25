<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Payment extends ActiveRecord{

    public $transaction_id;
    public $lease_id;
    public $establishment_id;
    public $payee_fname, $payee_mname, $payee_lname, $payee_suffix;
    public $amount;
    public $date;
    public $or_number;
    public $payment_status;
    
    public function getTransactionID(){
        return $transaction_id;
    }

    public function getTransactionInfo(){
        return [];
    }
}

?>