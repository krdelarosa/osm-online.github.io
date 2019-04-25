<?php
use yii\helpers\html;
$this->title = 'Occupancy Management System';
?>
<div class="site-index">

    <?php if(Yii::$app->session->hasFlash('message')): ?>
    <?php echo Yii::$app->session->getFlash('message'); ?>
    <?php endif; ?>

    <div>

        <h3><?php echo $establishment->est_name;?> Payment Monitor</h3>

    </div>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3">
                <span><?=HTML::a('Home',['dashboard','est_id'=>$establishment->est_id], ['class'=>'btn btn-primary'])?></span>
                <span><?=HTML::a('Add Payment',['addpayment','est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
            </div>    
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Payment ID</th>
                        <th scope="col">Tenant ID</th>
                        <th scope="col">Lease ID</th>
                        <th scope="col">Payee Name</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(count($payments)>0): ?>
                    <?php foreach($payments as $payment): ?>

                <tr class="table-active">
                    <th scope="row"><?php echo $payment->transaction_id; ?></th>

                    <td><?php echo $payment->tenant_id; ?></td>
                    <td><?php echo $payment->lease_id; ?></td>
                    <td><?php echo $payment->payee_fname." ".$payment->payee_mname." ".$payment->payee_lname." ".$payment->payee_suffix; ?></td>
                    <td><?php echo $payment->amount; ?></td>
                    <td><?php echo $payment->date; ?></td>

                    <td>
                        <span><?=HTML::a('View',['paymentview','id'=>$payment->transaction_id,'est_id'=>$establishment->est_id], ['class'=>'label label-primary'])?></span>
                        <span><?=HTML::a('Update',['paymentupdate','id'=>$payment->transaction_id,'est_id'=>$establishment->est_id], ['class'=>'label label-primary'])?></span>
                        <span><?=HTML::a('Delete',['paymentdelete','id'=>$payment->transaction_id,'est_id'=>$establishment->est_id], ['class'=>'label label-primary'])?></span>
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