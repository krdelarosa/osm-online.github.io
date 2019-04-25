<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">
    <?php $items = ['student'=>'Student','employed'=>'Employed'] ?>
    <?php $form = ActiveForm::begin(); ?>

    <div class="body-content">
        <div class = "row">
            <div class="col-lg-10">
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                <span><?=HTML::a('Back',['directory','est_id'=>$tenant->establishment_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6">
                
                <?= $form->field($tenant, 't_fname')?>      
                <?= $form->field($tenant, 't_mname') ?>     
                <?= $form->field($tenant, 't_lname')?>      
                <?= $form->field($tenant, 't_suffix') ?>    
                <?= $form->field($tenant, 't_status')->dropDownList($items,['row'=>'2']) ?>
            </div>

            <div class="col-lg-6">
                <?= $form->field($tenant, 't_phone')?>
                <?= $form->field($tenant, 't_email') ?>
                <?= $form->field($tenant, 't_nationality')?>
                <?= $form->field($tenant, 't_institution') ?>
            </div>
        </div>
        <div><hr></hr></div>
        <div class="row">
            <div class="col-lg">
                <h3>Emergency Contact Information</h3>
            </div>
            <div class="col-lg">
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_fname')?></div>      
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_mname') ?></div>     
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_lname')?></div>      
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_suffix') ?></div>    
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_phone')?></div>
            </div>
        </div>
            
        <?php ActiveForm::end(); ?>
        

        <div>
            <hr></hr>
        </div>
        
        <div class="row">
            <div class="col-lg-10">
                <h3>Tenant Lease Information</h3>
            </div>
            <div class="col-lg-2">
            <span><?= Html::a('Add Lease', ['addlease','id'=>$tenant->t_id], ['class' => 'btn btn-primary']) ?></span>
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
                                            <span><?=HTML::a('Delete', ['deletelease','id'=>$lease->lease_id],['class'=>'label label-primary'])?></span>
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