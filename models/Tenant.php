<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oms_db.tenant".
 *
 * @property int $t_id
 * @property string $t_fname
 * @property string $t_mname
 * @property string $t_lname
 * @property string $t_suffix
 * @property string $t_phone
 * @property string $t_email
 * @property string $t_nationality
 * @property string $t_status
 * @property string $t_institution
 * @property string $ec_fname
 * @property string $ec_mname
 * @property string $ec_lname
 * @property string $ec_suffix
 * @property string $ec_phone
 */
class Tenant extends \app\models\TenantBase
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_db.tenant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['t_fname', 't_mname', 't_lname','t_phone', 't_nationality', 't_status', 't_institution'], 'required'],
            [['t_phone','t_email'], 'string'],
            [['t_fname', 't_mname', 't_lname', 't_nationality', 't_status', 't_institution'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'Tenant ID',
            't_fname' => 'First Name',
            't_mname' => 'Middle Name',
            't_lname' => 'Last Name',
            't_suffix' => 'Suffix',
            't_phone' => 'Phone Number',
            't_email' => 'Email Address',
            't_nationality' => 'Nationality',
            't_status' => 'Tenant Status',
            't_institution' => 'Affiliate Institution',
            'ec_fname' => 'First Name',
            'ec_mname' => 'Middle Name',
            'ec_lname' => 'Last Name',
            'ec_suffix' => 'Suffix',
            'ec_phone' => 'Phone Number',
        ];
    }
}
