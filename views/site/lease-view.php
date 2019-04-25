<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Payment;

$this->title = 'Occupancy Management System';

$payments = Payment::find()->where(['lease_id' => $lease->lease_id])->all();
?>
<div class="site-index">

    <div class="body-content">
        <div class = "row">
            <div class="col-lg-10">
                <p class="lead"><?php echo $lease->lessee_lname; ?>, <?php echo $lease->lessee_fname; ?></p>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <span><?=HTML::a('Update',['updatelease','id'=>$lease->lease_id], ['class'=>'btn btn-primary'])?></span>
                    <span><?=HTML::a('Back',['view','id'=>$lease->t_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-lg-6">
                
                <p class="lead">First Name: <?php echo $lease->lessee_fname; ?></p>   
                <p class="lead">Middle Name: <?php echo $lease->lessee_mname; ?></p>     
                <p class="lead">Last Name: <?php echo $lease->lessee_lname; ?></p>      
                <p class="lead">Suffix: <?php echo $lease->lessee_suffix; ?></p>    
                <p class="lead">lease Status: <?php echo $lease->lease_status; ?></p>
                <p class="lead">Payment Status: <?php echo $lease->payment_status;  ?></p>
            </div>

            <div class="col-lg-6">
                <p class="lead">Period Start: <?php echo $lease->period_start; ?></p>   
                <p class="lead">Period End: <?php echo $lease->period_end; ?></p>     
                <p class="lead">Payment Method: <?php echo $lease->payment_type; ?></p>      
                <p class="lead">Payment Schedule: <?php echo $lease->payment_schedule; ?></p>    
                <p class="lead">Payment Total: <?php echo $lease->payment_total;  ?></p>
            </div>
        </div>

        <div><hr></hr></div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Payment ID</th>
                            <th scope="col">Payee Name</th>
                            <th scope="col">Payment Date</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($payments)>0): ?>
                            <?php foreach ($payments as $payment): ?>  
                                    
                                    <tr class="table-active">
                                        <th scope="row"><?php echo $payment->transaction_id ?></th>
                            
                                        <td><?php echo $payment->payee_fname." ".$payment->payee_mname." ".$payment->payee_lname." ".$payment->payee_suffix; ?></td>
                                        <td><?php echo $payment->date; ?></td>
                                        <td><?php echo $payment->amount; ?></td>

                                        <td>
                                            <span><?=HTML::a('View', ['paymentview','id'=>$payment->transaction_id],['class'=>'label label-primary'])?></span>
                                            <span><?=HTML::a('Update', ['paymentupdate','id'=>$payment->transaction_id], ['class'=>'label label-primary'])?></span>
                                            <span><?=HTML::a('Delete', ['paymentdelete','id'=>$payment->transaction_id], ['class'=>'label label-primary'])?></span>
                                        </td>
                                    </tr>
                                
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="table-active">
                                <td>No Record Found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            
        </div>
</div>