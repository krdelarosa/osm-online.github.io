<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oms_db.establishment".
 *
 * @property int $est_id
 * @property string $est_name
 * @property string $address_street
 * @property string $address_brgy
 * @property string $address_city
 * @property string $address_province
 * @property string $bus_permit
 * @property string $brgy_permit
 */
class Establishment extends \app\models\EstablishmentBase
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_db.establishment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_name', 'address_street', 'address_brgy', 'address_city', 'address_province', 'bus_permit', 'brgy_permit'], 'required'],
            [['est_name', 'address_street', 'address_brgy', 'address_city', 'address_province', 'bus_permit', 'brgy_permit'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_id' => 'Est ID',
            'est_name' => 'Est Name',
            'address_street' => 'Address Street',
            'address_brgy' => 'Address Brgy',
            'address_city' => 'Address City',
            'address_province' => 'Address Province',
            'bus_permit' => 'Business Permit',
            'brgy_permit' => 'Brgy Permit',
        ];
    }
}
