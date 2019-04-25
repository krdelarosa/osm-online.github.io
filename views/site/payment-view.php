<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Lease;

$this->title = 'Occupancy Management System';
$lease = Lease::findOne($payment->lease_id);
?>
<div class="site-index">

    <div class="body-content">
        <div class = "row">
            <div class="col-lg-2">
                <div class="form-group">
                    <span><?=HTML::a('Update',['paymentupdate','id'=>$payment->transaction_id,'est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
                    <span><?=HTML::a('Back',['monitor','est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-lg-6">
                
                <p class="lead">Payment Number: <?php echo $payment->transaction_id; ?></p> 
                <p class="lead">Lease Number: <?php echo $payment->lease_id; ?></p>     
                <p class="lead">Payee Name: <?php echo $payment->payee_fname." ".$payment->payee_mname." ".$payment->payee_lname." ".$payment->payee_suffix; ?></p>     
                <p class="lead">Date Paid: <?php echo $payment->date; ?></p>      
                <p class="lead">Amount Paid: <?php echo $payment->amount; ?></p>    
                <p class="lead">OR Number:: <?php echo $payment->receipt_number; ?></p>
            </div>

</div>