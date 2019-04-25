<?php

/* @var $this yii\web\View */
use miloschuman\highcharts\Highcharts;

use yii\helpers\html;
use app\models\Tenant;
use app\models\Lease;
use app\models\Payment;
use app\models\User;

$this->title = 'Occupancy Management System';
ChromePhp::log('yii::app'.Yii::$app->user->id);
#ChromePhp::log(User::findOne(Yii::$app->user->id)->establishment_id);
?>
<div class="site-index">

    <div>
        <h1>Occupancy Management System</h1>
    </div>

    <div><hr></hr></div>

    <div>
    <span><?=HTML::a('Establishment',['establishment','id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
    <span><?=HTML::a('Admin',['admin','id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
    <span><?=HTML::a('Logout',['logout'], ['class'=>'btn btn-primary'])?></span>
    </div>

    <div><hr></hr></div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
            <h3>Tenant Summary</h3>
            <p>Total Number of tenants: <?php echo count($tenants); ?></p>
            <p>Total Number of student tenants: <?php echo count(Tenant::findAll(['establishment_id'=>$est_id,'t_status'=>'student'])); ?></p>
            <p>Total Number of employed tenants: <?php echo count(Tenant::findAll(['establishment_id'=>$est_id,'t_status'=>'employed'])); ?></p>
            <span><?=HTML::a('Tenant Directory',['directory','est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
            </div>
            <div class="col-lg-6">
            <h3>Payment Summary</h3>
            <p>Total Number of payments: <?php echo count($payments); ?></p>
            <span><?=HTML::a('Payment Monitor',['monitor','est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
            </div>
        </div>
    </div>
</div>
