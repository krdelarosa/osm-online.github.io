<?php

/* @var $this yii\web\View */
use yii\helpers\html;

use app\models\User;

$this->title = 'Occupancy Management System';

?>
<div class="site-index">

    <div>
        <h1><?php echo $establishment->est_name;?></h1>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-10">
                
            </div>
            <div class="col-lg-2">
                <span><?=HTML::a('Home',['dashboard','est_id'=>$establishment->est_id], ['class'=>'btn btn-primary'])?></span>
                <span><?=HTML::a('Update',['establishmentupdate','id'=>$establishment->est_id], ['class'=>'btn btn-primary'])?></span>
            </div>
            <div class="col-lg-12">
            <p class="lead">Address: <?php echo $establishment->address_street.", ".$establishment->address_brgy.", ".$establishment->address_city.", ".$establishment->address_province; ?></p> 
            <p class="lead">Business Permit: <?php echo $establishment->bus_permit; ?></p> 
            <p class="lead">Barangay Permit: <?php echo $establishment->brgy_permit; ?></p> 
            </div>
        </div>

        <div><hr></hr></div>

        <div class="row">
            <div class="col-lg-6">
                <div class="col-lg-12"><h3>Owner Informantion</h3></div>
                <div class="col-lg-12"><span><?=HTML::a('Add', ['useradd','id'=>$establishment->est_id],['class'=>'label label-primary'])?></span></div>
                
                <table class="table table-hover">
                    
                    <thead>
                        <tr>
                            <th scope="col">Owner ID</th>
                            <th scope="col">Owner Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $owners = User::findAll(['u_type'=>"owner",'establishment_id'=>$establishment->est_id]); ?>
                        <?php ChromePhp::log($owners) ?>
                        <?php if (count($owners)>0): ?>
                            <?php foreach ($owners as $owner): ?>  
                                    
                                    <tr class="table-active">
                                        <th scope="row"><?php echo $owner->u_id ?></th>
                                        <td><?php echo $owner->u_fname." ".$owner->u_mname." ".$owner->u_lname." ".$owner->u_suffix; ?></td>
                                        <td><?php echo $owner->u_phone;?></td>
                                        <td>
                                            <span><?=HTML::a('View', ['userview','id'=>$owner->u_id],['class'=>'label label-primary'])?></span>
                                            <span><?=HTML::a('Update', ['userupdate','id'=>$owner->u_id], ['class'=>'label label-primary'])?></span>
                                            <span><?=HTML::a('Delete', ['userdelete','id'=>$owner->u_id], ['class'=>'label label-primary'])?></span>
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

            <div class="col-lg-6">
                <div class="col-lg-12"><h3>Manager Informantion</h3></div>
                <div class="col-lg-12"><span><?=HTML::a('Add', ['useradd','id'=>$establishment->est_id],['class'=>'label label-primary'])?></span></div>
                
                <table class="table table-hover">
                    
                    <thead>
                        <tr>
                            <th scope="col">Manager ID</th>
                            <th scope="col">Manager Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php $managers = User::findAll(['u_type'=>"manager",'establishment_id'=>$establishment->est_id]); ?>
                        <?php ChromePhp::log($managers) ?>
                        <?php if (count($managers)>0): ?>
                            <?php foreach ($managers as $manager): ?>  
                                    
                                    <tr class="table-active">
                                        <th scope="row"><?php echo $manager->u_id ?></th>
                                        <td><?php echo $manager->u_fname." ".$manager->u_mname." ".$manager->u_lname." ".$manager->u_suffix; ?></td>
                                        <td><?php echo $manager->u_phone;?></td>
                                        <td>
                                            <span><?=HTML::a('View', ['userview','id'=>$manager->u_id],['class'=>'label label-primary'])?></span>
                                            <span><?=HTML::a('Update', ['userupdate','id'=>$manager->u_id], ['class'=>'label label-primary'])?></span>
                                            <span><?=HTML::a('Delete', ['userdelete','id'=>$manager->u_id], ['class'=>'label label-primary'])?></span>
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
</div>
