<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "person".
 *
 * @property int $person_id
 * @property string $first_name
 * @property string $last_name
 * @property int $address_id
 * @property string $email_address
 * @property string $phone_number
 * @property int $person_type_id
 *
 * @property CompanyContact $companyContact
 * @property EventTimetableSlotPerson[] $eventTimetableSlotPeople
 * @property Grouping[] $groupings
 * @property Instructor $instructor
 * @property Learner $learner
 * @property ParentGuardian $parentGuardian
 * @property Address $address
 * @property PersonType $personType
 */
class Person extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'first_name', 'last_name', 'address_id', 'email_address', 'phone_number', 'person_type_id'], 'required'],
            [['person_id', 'address_id', 'person_type_id'], 'default', 'value' => null],
            [['person_id', 'address_id', 'person_type_id'], 'integer'],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['email_address'], 'string', 'max' => 99],
            [['phone_number'], 'string', 'max' => 15],
            [['person_id'], 'unique'],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address_id' => 'address_id']],
            [['person_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PersonType::className(), 'targetAttribute' => ['person_type_id' => 'person_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'person_id' => 'Person ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'address_id' => 'Address ID',
            'email_address' => 'Email Address',
            'phone_number' => 'Phone Number',
            'person_type_id' => 'Person Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyContact()
    {
        return $this->hasOne(CompanyContact::className(), ['company_contact_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTimetableSlotPeople()
    {
        return $this->hasMany(EventTimetableSlotPerson::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroupings()
    {
        return $this->hasMany(Grouping::className(), ['person_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructor::className(), ['instructor_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLearner()
    {
        return $this->hasOne(Learner::className(), ['learner_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentGuardian()
    {
        return $this->hasOne(ParentGuardian::className(), ['parent_guardian_id' => 'person_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonType()
    {
        return $this->hasOne(PersonType::className(), ['person_type_id' => 'person_type_id']);
    }
}
