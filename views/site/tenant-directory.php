<?php
use yii\helpers\html;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">

    <div>
    <?php if(Yii::$app->session->hasFlash('message')): ?>
    <?php echo Yii::$app->session->getFlash('message'); ?>
    <?php endif; ?>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg">
                <h3><?php echo $establishment->est_name;?> Tenant Directory</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
            </div> 
            <div class="col-lg-4">
                <span><?=HTML::a('Home',['dashboard','est_id'=>$establishment->est_id], ['class'=>'btn btn-primary'])?></span>
                <span><?=HTML::a('Add Tenant',['add','est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
            </div>   
            
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tenant ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Suffix</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php if(count($tenants)>0): ?>
                    <?php foreach($tenants as $tenant): ?>
    <?php \ChromePhp::log('Tenant:', gettype($tenant->t_id));?>
    <?php \ChromePhp::log('Tenant:', $tenant->t_fname);?>
    <?php \ChromePhp::log('Tenant:', $tenant->t_lname);?>
                <tr class="table-active">
                    <th scope="row"><?php echo $tenant->t_id;?></th>
                        
                    <td><?php echo $tenant->t_fname; ?></td>
                    <td><?php echo $tenant->t_mname; ?></td>
                    <td><?php echo $tenant->t_lname; ?></td>
                    <td><?php echo $tenant->t_suffix; ?></td>
                    <td><?php echo $tenant->t_phone; ?></td>
                    <td><?php echo $tenant->t_status; ?></td>

                    <td>
                        <span><?=HTML::a('View',['view','id'=>$tenant->t_id], ['class'=>'label label-primary'])?></span>
                        <span><?=HTML::a('Update',['update','id'=>$tenant->t_id], ['class'=>'label label-primary'])?></span>
                        <span><?=HTML::a('Delete',['delete','id'=>$tenant->t_id], ['class'=>'label label-primary'])?></span>
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