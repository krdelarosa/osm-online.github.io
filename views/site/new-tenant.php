<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Occupancy Management System';
?>
<div class="site-index">
    <?php $items = ['student'=>'Student','employed'=>'Employed'] ?>
    <?php $form = ActiveForm::begin(['id' => 'new-form']); ?>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-10">
                <h3>Tenant Information</h3>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'submit-button']) ?>
                    <a href = <?php echo Yii::$app->homeUrl;?> class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <?= $form->field($tenant, 't_fname')?>      
                <?= $form->field($tenant, 't_mname') ?>     
                <?= $form->field($tenant, 't_lname')?>      
                <?= $form->field($tenant, 't_suffix') ?>    
                <?= $form->field($tenant, 't_status')->dropDownList($items,['row'=>'2']) ?>
            </div>

            <div class="col-lg-6">
            <?= $form->field($tenant, 't_phone')?>
            <?= $form->field($tenant, 't_email') ?>
            <?= $form->field($tenant, 't_nationality')?>
            <?= $form->field($tenant, 't_institution') ?>
            </div>
        </div>
        <div><hr></hr></div>
        <div class="row">
            <div class="col-lg">
                <h3>Emergency Contact Information</h3>
            </div>
            <div class="col-lg">
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_fname')?></div>      
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_mname') ?></div>     
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_lname')?></div>      
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_suffix') ?></div>    
                <div class="col-lg-3"><?= $form->field($tenant, 'ec_phone')?></div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
    
</div>