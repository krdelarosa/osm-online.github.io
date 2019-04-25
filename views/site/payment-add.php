<?php
use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Tenant;
use app\models\Lease;

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
                        <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                        <span><?=HTML::a('Back',['monitor','est_id'=>$est_id], ['class'=>'btn btn-primary'])?></span>
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
                <?= $form->field($payment, 'tenant_id')->dropDownList( ArrayHelper::map(Tenant::find()->where(['establishment_id'=>$est_id])->asArray()->all(), 't_id', 't_lname')) ?>  
                <?= $form->field($payment, 'lease_id')->dropDownList(ArrayHelper::map(Lease::find()->where(['establishment_id'=>$est_id])->asArray()->all(), 'lease_id', 'lessee_lname')) ?>  
                <?= $form->field($payment, 'amount')?>
                <?= $form->field($payment, 'date')->widget(DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',]) ?>
                <?= $form->field($payment, 'receipt_number') ?> 
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
    </div>
    
</div>