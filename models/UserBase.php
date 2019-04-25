<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oms_db.user".
 *
 * @property int $u_id
 * @property string $u_fname
 * @property string $u_mname
 * @property string $u_lname
 * @property string $u_suffix
 * @property string $u_phone
 * @property string $u_email
 * @property string $u_type
 * @property string $ec_fname
 * @property string $ec_mname
 * @property string $ec_lname
 * @property string $ec_suffix
 * @property string $ec_phone
 * @property int $establishment_id
 */
class UserBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_db.user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_fname', 'u_mname', 'u_lname', 'u_suffix', 'u_phone', 'u_email', 'u_type', 'ec_fname', 'ec_mname', 'ec_lname', 'ec_suffix', 'ec_phone', 'establishment_id'], 'required'],
            [['establishment_id'], 'integer'],
            [['u_fname', 'u_mname', 'u_lname', 'u_suffix', 'u_phone', 'u_email', 'u_type', 'ec_fname', 'ec_mname', 'ec_lname', 'ec_suffix', 'ec_phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'u_id' => 'U ID',
            'u_fname' => 'U Fname',
            'u_mname' => 'U Mname',
            'u_lname' => 'U Lname',
            'u_suffix' => 'U Suffix',
            'u_phone' => 'U Phone',
            'u_email' => 'U Email',
            'u_type' => 'U Type',
            'ec_fname' => 'Ec Fname',
            'ec_mname' => 'Ec Mname',
            'ec_lname' => 'Ec Lname',
            'ec_suffix' => 'Ec Suffix',
            'ec_phone' => 'Ec Phone',
            'establishment_id' => 'Establishment ID',
        ];
    }
}
