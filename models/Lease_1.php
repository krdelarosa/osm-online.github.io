<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Lease extends ActiveRecord{

    public $lease_id;
    public $t_id;
    public $lessee_fname, $lessee_mname, $lessee_lname, $lessee_suffix;
    public $lessor_fname, $lessor_mname, $lessor_lname, $lessor_suffix;
    public $lessor_establishment;
    public $period_start, $period_end;
    public $payment_type, $payment_schedule, $payment_status;
    public $payment; #total payment
    public $pay_records; #payment transactions Transaction[] 
    public $lease_status;

    public function rules(){
        return [ [['t_id','period_start','period_end','payment_schedule','lease_status'],'required'] ];
    }

    public static function getDb()
    {
        return \Yii::$app->db;  
    }

    public function getLeaseID(){
        return $lease_id;
    }

    public function getLesseeName(){
        return [$lessee_fname, $lessee_mname, $lessee_lname, $lessee_suffix];
    }

    public function getLessorInfo(){
        return [$lessor_fname, $lessor_mname, $lessor_lname, $lessor_suffix, $lessor_establishment];
    }

    public function getLeasePeriod(){
        return [$period_start, $period_end];
    }

    public function getPaymentInfo(){
        return [$payment_type, $payment_schedule, $payment_status];
    }

    public function getPaymentUpdate(){
        return $payment;
    }

    public function getLeaseStatus(){
        return $lease_status;
    }

    public function setLesseeName($lessee_fname, $lessee_mname, $lessee_lname, $lessee_suffix){
        this.$lessee_fname = $lessee_fname;
        this.$lessee_mname = $lessee_mname;
        this.$lessee_lname = $lessee_lname;
        this.$lessee_suffix = $lessee_suffix;
    }

    public function setLessorName($lessor_fname, $lessor_mname, $lessor_lname, $lessor_suffix){
        this.$lessor_fname = $lessor_fname;
        this.$lessor_mname = $lessor_mname;
        this.$lessor_lname = $lessor_lname;
        this.$lessor_suffix = $lessor_suffix;
    }

    public function setLessorEst($lessor_establishment){
        this.$lessor_establishment = $lessor_establishment;
    }

    public function setLeasePeriod($period_start, $period_end){
        this.$period_start = $period_start;
        this.$period_end = $period_end;
    }

    public function setPaymentInfo($payment_type, $payment_schedule, $payment_status){
        this.$payment_type;
        this.$payment_schedule;
        this.$payment_status;
    }

    public function setPaymentUpdate($payment){
        this.$payment = $payment;
    }

    public function setLeaseStatus($lease_status){
        this.$lease_status = $lease_status;
    }
}

?>