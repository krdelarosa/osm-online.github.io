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
class TenantBase extends \yii\db\ActiveRecord
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
            [['t_fname', 't_mname', 't_lname', 't_suffix', 't_phone', 't_email', 't_nationality', 't_status', 't_institution', 'ec_fname', 'ec_mname', 'ec_lname', 'ec_suffix', 'ec_phone'], 'required'],
            [['t_phone'], 'string'],
            [['t_fname', 't_mname', 't_lname', 't_suffix', 't_email', 't_nationality', 't_status', 't_institution', 'ec_fname', 'ec_mname', 'ec_lname', 'ec_suffix', 'ec_phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'T ID',
            't_fname' => 'T Fname',
            't_mname' => 'T Mname',
            't_lname' => 'T Lname',
            't_suffix' => 'T Suffix',
            't_phone' => 'T Phone',
            't_email' => 'T Email',
            't_nationality' => 'T Nationality',
            't_status' => 'T Status',
            't_institution' => 'T Institution',
            'ec_fname' => 'Ec Fname',
            'ec_mname' => 'Ec Mname',
            'ec_lname' => 'Ec Lname',
            'ec_suffix' => 'Ec Suffix',
            'ec_phone' => 'Ec Phone',
        ];
    }
}
