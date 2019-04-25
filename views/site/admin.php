<?php
use yii\helpers\html;
use app\models\User;

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
            </div>
        </div>

        <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3">
                <span><?=HTML::a('Home',['dashboard'], ['class'=>'btn btn-primary'])?></span>
                <span><?=HTML::a('Add establishment',['addestablishment',], ['class'=>'btn btn-primary'])?></span>
            </div>    
        </div>

        <div class="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Establishment ID</th>
                        <th scope="col">Establishment Name</th>
                        <th scope="col">Owner</th>
                        <th scope="col">Manager</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>

                <?php if(count($establishments)>0): ?>
                    <?php foreach($establishments as $establishment): ?>
                    <?php \ChromePhp::log('establishment:', gettype($establishment->est_id));?>
        <?php \ChromePhp::log('establishment:', $establishment->est_name);?>
                
                <tr class="table-active">
                    <th scope="row"><?php echo $establishment->est_id;?></th>
                        
                    <td><?php echo $establishment->est_name; ?></td>
                    <td><?php foreach(User::findAll(['establishment_id'=>$establishment->est_id,'u_type'=>'owner']) as $owner):?>
                        <?php echo $owner->u_fname." ".$owner->u_mname." ".$owner->u_lname." ".$owner->u_suffix;?>
                        <?php endforeach;?>
                    </td>
                    <td><?php foreach(User::findAll(['establishment_id'=>$establishment->est_id,'u_type'=>'manager']) as $manager):?>
                        <?php echo $manager->u_fname." ".$manager->u_mname." ".$manager->u_lname." ".$manager->u_suffix."<br>";?>
                        <?php endforeach;?>
                    </td>
                    <td>
                        <span><?=HTML::a('View',['viewestablishment','id'=>$establishment->est_id], ['class'=>'label label-primary'])?></span>
                        <span><?=HTML::a('Update',['establishmentupdate','id'=>$establishment->est_id], ['class'=>'label label-primary'])?></span>
                        <span><?=HTML::a('Delete',['deleteestablishment','id'=>$establishment->est_id], ['class'=>'label label-primary'])?></span>
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