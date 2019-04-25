<?php
use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">
    <?php $form = ActiveForm::begin(['id' => 'new-form']); ?>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-10">
                    <h3>Payment Information</h3>
            </div>
            <div class="col-lg-2">
                    <div class="form-group">
                        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                        <span><?=HTML::a('Back',['monitor'], ['class'=>'btn btn-primary'])?></span>
                    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($payment, 'payee_fname')?>      
                <?= $form->field($payment, 'payee_mname') ?>     
                <?= $form->field($payment, 'payee_lname')?>      
                <?= $form->field($payment, 'payee_suffix') ?>  
            </div>
            <div class="col-lg-6">
                <?= $form->field($payment, 'tenant_id') ?>  
                <?= $form->field($payment, 'lease_id') ?>  
                <?= $form->field($payment, 'amount')?>
                <?= $form->field($payment, 'date')->widget(DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',]) ?>
                <?= $form->field($payment, 'receipt_number') ?> 
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
    
</div>