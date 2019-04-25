<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">
    <?php $form = ActiveForm::begin(['id' => 'new-form']); ?>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-10">
                <h3>Establishment Information</h3>
            </div>        
            <div class="col-lg-2">
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                    <span><?=HTML::a('Back',['view','id'=>$establishment->est_id], ['class'=>'btn btn-primary'])?></span>
                </div>
            </div>
        </div>
        <div class="row">
        <div class = "row">
            <div class="col-lg-6">
                <?= $form->field($establishment, 'est_name')?>
                <?= $form->field($establishment, 'bus_permit') ?>
                <?= $form->field($establishment, 'brgy_permit') ?>
            </div>
            <div class="col-lg-6">
                <?= $form->field($establishment, 'address_street') ?>
                <?= $form->field($establishment, 'address_brgy')?>
                <?= $form->field($establishment, 'address_city') ?>
                <?= $form->field($establishment, 'address_province')?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    
</div>