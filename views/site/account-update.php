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
                    <span><?=HTML::a('Back',['view','id'=>$account->u_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        <div class = "row">
            <h4>Account Information</h4>
            <div class="col-lg-3"><?= $form->field($account, 'u_name')?></div>
            <div class="col-lg-3"><?= $form->field($account, 'u_password')?></div>
        </div>
        <?php ActiveForm::end(); ?>
    
    
</div>