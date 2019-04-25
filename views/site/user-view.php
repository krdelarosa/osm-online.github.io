<?php

/* @var $this yii\web\View */
use yii\helpers\html;

use app\models\User;

$this->title = 'Occupancy Management System';

?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-10">
            <p class="lead"><?php echo $user->u_type; ?></p>
                
            </div>
            
            <div class="col-lg-2">
                <span><?=HTML::a('Update',['userupdate','id'=>$user->u_id], ['class'=>'btn btn-primary'])?></span>
                <span><?=HTML::a('Back',['establishment','id'=>$user->establishment_id], ['class'=>'btn btn-primary'])?></span>
            </div>
            
            <div class="col-lg-6">
                <p class="lead">Name: <?php echo $user->u_fname." ".$user->u_mname." ".$user->u_lname." ".$user->u_suffix; ?></p>
                <p class="lead">Phone Number: <?php echo $user->u_phone; ?></p>
                <p class="lead">Email Address: <?php echo $user->u_email; ?></p>
            </div>

            <div class="col-lg-6">
                <p class="lead">Emergency Contact Information</p>
                <p class="lead">Name: <?php echo $user->ec_fname." ".$user->ec_mname." ".$user->ec_lname." ".$user->ec_suffix; ?></p>
                <p class="lead">Phone Number: <?php echo $user->ec_phone; ?></p>
            </div>

            <div class="col-lg-12">
                <p class="lead">Account Information <?=HTML::a('Update',['accountupdate','user'=>$user], ['class'=>'label label-primary'])?></p>
                
                <p class="lead">Username: <?php echo $account->u_name; ?></p>
                <p class="lead">Password: <?php echo $account->u_password; ?></p>
            </div>
        </div>
   
    </div>
</div>
