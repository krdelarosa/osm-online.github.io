<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">
    <?php $form = ActiveForm::begin(['id' => 'new-form']); ?>
    <?php $u_types = ['owner'=>'Owner','manager'=>'Manager'] ?>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-10">
                <h3>User Information</h3>
            </div>        
            <div class="col-lg-2">
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                    <span><?=HTML::a('Back',['userview','id'=>$user->u_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3"><?= $form->field($user, 'u_fname')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'u_mname')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'u_lname')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'u_suffix')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'u_type')->dropDownList($u_types,['row'=>'0'])?></div>
            <div class="col-lg-3"><?= $form->field($user, 'u_phone')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'u_email')?></div>
        </div>
        <div class = "row">
            <h4>Emergency Contact Information</h4>
            <div class="col-lg-3"><?= $form->field($user, 'ec_fname')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'ec_mname')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'ec_lname')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'ec_suffix')?></div>
            <div class="col-lg-3"><?= $form->field($user, 'ec_phone')?></div>
        </div>
        <?php ActiveForm::end(); ?>
    
    
</div>