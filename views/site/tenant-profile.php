<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\Lease;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">

    <?php if(Yii::$app->session->hasFlash('message')): ?>
    <?php echo Yii::$app->session->getFlash('message'); ?>
    <?php endif; ?>
    
    <div class="body-content">
        
        <div class="row">
            <div class="col-lg-10">
            </div>
            <div class="col-lg-2"> 
                <div class="form-group">
                    <span><?=HTML::a('Update',['update','id'=>$tenant->t_id], ['class'=>'btn btn-primary'])?></span>
                    <span><?=HTML::a('Back',['directory','est_id'=>$tenant->establishment_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                
                <p class="lead">First Name: <?php echo $tenant->t_fname ?></p>   
                <p class="lead">Middle Name: <?php echo $tenant->t_mname ?></p>     
                <p class="lead">Last Name: <?php echo $tenant->t_lname ?></p>      
                <p class="lead">Suffix: <?php echo $tenant->t_suffix ?></p>    
                <p class="lead">Tenant Status: <?php echo $tenant->t_status ?></p>
            </div>

            <div class="col-lg-6">
                <p class="lead">Phone Number: <?php echo $tenant->t_phone ?></p>
                <p class="lead">Email Address:<?php echo $tenant->t_email ?></p>
                <p class="lead">Nationality: <?php echo $tenant->t_nationality ?></p>
                <p class="lead">Affiliated Institution: <?php echo $tenant->t_institution ?></p>
            </div>
        </div>
        <div><hr></hr></div>
        <div class="row">
                <div class="col-lg">
                    <div class="col-lg-6"><p class="lead">Emergency Contact Person: <?php echo $tenant->ec_fname." ".$tenant->ec_mname." ".$tenant->ec_lname." ".$tenant->ec_suffix; ?></p></div>
                    <div class="col-lg-6"><p class="lead">Contact Number:<?php echo $tenant->ec_phone; ?></p></div>
                </div>
            </div>
        <div><hr></hr></div>
        <div class="row">
            <div class="col-lg-12">
                <h3>Tenant Lease Information</h3>
            </div>
        </div>    
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Lease ID</th>
                            <th scope="col">Lessee</th>
                            <th scope="col">Lease Start Date</th>
                            <th scope="col">Lease End Date</th>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Total Payment</th>
                            <th scope="col">Lease Status</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($leases)>0): ?>
                            <?php foreach ($leases as $lease): ?>  
                                    <tr class="table-active">
                                        <th scope="row"><?php echo $lease->lease_id; ?></th>
                                        <td><?php echo $lease->lessee_fname." ".$lease->lessee_mname." ".$lease->lessee_lname." ".$lease->lessee_suffix; ?></td>
                                        <td><?php echo $lease->period_start; ?></td>
                                        <td><?php echo $lease->period_end; ?></td>
                                        <td><?php echo $lease->payment_type; ?></td>
                                        <td><?php echo $lease->payment_total; ?></td>
                                        <td><?php echo $lease->lease_status; ?></td>

                                        <td>
                                            <span><?=HTML::a('View', ['viewlease','id'=>$lease->lease_id],['class'=>'label label-primary'])?></span>
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