<?php
use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">
    <?php $p_type = ['cash'=>'Cash','cheque'=>'Cheque','credit'=>'Credit Card'] ?>
    <?php $p_sched = ['monthly'=>'Monthly','weekly'=>'Weekly','yearly'=>'Yearly'] ?>
    <?php $p_status = ['updated'=>'Up to Date','pending'=>'Overdue'] ?>
    <?php $l_status = ['active'=>'Active','complete'=>'Complete'] ?>
    
    <?php $form = ActiveForm::begin(['id' => 'new-form']); ?>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-10">
                
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                    <span><?=HTML::a('Back',['view','id'=>$lease->t_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        <div class="row">
        <div class = "row">
            <h3>Lease Information</h3>
            <div class="col-lg-6">
                <?= $form->field($lease, 'lessee_fname')?>
                <?= $form->field($lease, 'lessee_mname') ?>
                <?= $form->field($lease, 'lessee_lname')?>
                <?= $form->field($lease, 'lessee_suffix') ?>

                <div class="col-lg-5">
                    <?= $form->field($lease, 'period_start')->widget(DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',]) ?>
                </div>
                <div class="col-lg-5">
                    <?= $form->field($lease, 'period_end')->widget(DatePicker::class, ['dateFormat' => 'yyyy-MM-dd',]) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <?= $form->field($lease, 'payment_type')->dropDownList($p_type,['row'=>'2']) ?>
                <?= $form->field($lease, 'payment_schedule')->dropDownList($p_sched,['row'=>'2']) ?>
                <?= $form->field($lease, 'payment_status')->dropDownList($p_status,['row'=>'2']) ?>
                <?= $form->field($lease, 'lease_status')->dropDownList($l_status,['row'=>'2']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    
</div>