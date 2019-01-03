<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $address_id
 * @property int $building_number
 * @property string $first_line
 * @property string $second_line
 * @property string $county
 * @property string $postcode
 *
 * @property Person[] $people
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['building_number', 'first_line', 'second_line', 'county', 'postcode'], 'required'],
            [['building_number'], 'default', 'value' => null],
            [['building_number'], 'integer'],
            [['first_line', 'second_line', 'county', 'postcode'], 'string', 'max' => 99],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'building_number' => 'Building Number',
            'first_line' => 'First Line',
            'second_line' => 'Second Line',
            'county' => 'County',
            'postcode' => 'Postcode',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasMany(Person::className(), ['address_id' => 'address_id']);
    }
}
