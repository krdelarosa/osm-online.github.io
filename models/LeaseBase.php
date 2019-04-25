<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oms_db.lease".
 *
 * @property int $lease_id
 * @property int $t_id
 * @property string $lessee_fname
 * @property string $lessee_mname
 * @property string $lessee_lname
 * @property string $lessee_suffix
 * @property string $lessor_fname
 * @property string $lessor_mname
 * @property string $lessor_lname
 * @property string $lessor_suffix
 * @property string $lessor_establishment
 * @property string $period_start
 * @property string $period_end
 * @property string $payment_type
 * @property string $payment_schedule
 * @property string $payment_status
 * @property int $payment_total
 * @property string $lease_status
 * @property int $payments
 */
class LeaseBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_db.lease';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['t_id', 'lessee_fname', 'lessee_mname', 'lessee_lname', 'lessee_suffix', 'lessor_fname', 'lessor_mname', 'lessor_lname', 'lessor_suffix', 'lessor_establishment', 'period_start', 'period_end', 'payment_type', 'payment_schedule', 'payment_status', 'payment_total', 'lease_status', 'payments'], 'required'],
            [['t_id', 'payment_total', 'payments'], 'integer'],
            [['period_start', 'period_end'], 'safe'],
            [['lessee_fname', 'lessee_mname', 'lessee_lname', 'lessee_suffix', 'lessor_fname', 'lessor_mname', 'lessor_lname', 'lessor_suffix', 'lessor_establishment', 'payment_type', 'payment_schedule', 'payment_status', 'lease_status'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lease_id' => 'Lease ID',
            't_id' => 'T ID',
            'lessee_fname' => 'Lessee Fname',
            'lessee_mname' => 'Lessee Mname',
            'lessee_lname' => 'Lessee Lname',
            'lessee_suffix' => 'Lessee Suffix',
            'lessor_fname' => 'Lessor Fname',
            'lessor_mname' => 'Lessor Mname',
            'lessor_lname' => 'Lessor Lname',
            'lessor_suffix' => 'Lessor Suffix',
            'lessor_establishment' => 'Lessor Establishment',
            'period_start' => 'Period Start',
            'period_end' => 'Period End',
            'payment_type' => 'Payment Type',
            'payment_schedule' => 'Payment Schedule',
            'payment_status' => 'Payment Status',
            'payment_total' => 'Payment Total',
            'lease_status' => 'Lease Status',
            'payments' => 'Payments',
        ];
    }
}
