<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oms_db.accounts".
 *
 * @property int $acc_id
 * @property int $u_id
 * @property string $u_name
 * @property string $u_password
 * @property string $u_type
 */
class AccountBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_db.accounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id', 'u_name', 'u_password', 'u_type'], 'required'],
            [['u_id'], 'integer'],
            [['u_name', 'u_password', 'u_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'acc_id' => 'Acc ID',
            'u_id' => 'U ID',
            'u_name' => 'U Name',
            'u_password' => 'U Password',
            'u_type' => 'U Type',
        ];
    }
}
