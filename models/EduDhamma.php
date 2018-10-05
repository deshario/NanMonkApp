<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edu_dhamma".
 *
 * @property int $dhamma_id
 * @property string $dhamma_temple วัดที่เรียนธรรมะ
 * @property int $education_level ระดับการศึกษาของธรรมะ
 * @property int $dhamma_temple_address ที่อยู่วัดที่เรียนธรรมะ
 * @property string $dhamma_transcript ไฟล์แนบ transcript
 *
 * @property Address $dhammaTempleAddress
 * @property EducationLevel $educationLevel
 * @property Education[] $educations
 */
class EduDhamma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_dhamma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dhamma_id', 'dhamma_temple', 'education_level', 'dhamma_temple_address'], 'required'],
            [['dhamma_id', 'education_level', 'dhamma_temple_address'], 'integer'],
            [['dhamma_temple'], 'string', 'max' => 45],
            [['dhamma_transcript'], 'string', 'max' => 100],
            [['dhamma_id'], 'unique'],
            [['dhamma_temple_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['dhamma_temple_address' => 'address_id']],
            [['education_level'], 'exist', 'skipOnError' => true, 'targetClass' => EducationLevel::className(), 'targetAttribute' => ['education_level' => 'level_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dhamma_id' => 'Dhamma ID',
            'dhamma_temple' => 'วัดที่เรียนธรรมะ',
            'education_level' => 'ระดับการศึกษาของธรรมะ',
            'dhamma_temple_address' => 'ที่อยู่วัดที่เรียนธรรมะ',
            'dhamma_transcript' => 'ไฟล์แนบ transcript',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDhammaTempleAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'dhamma_temple_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationLevel()
    {
        return $this->hasOne(EducationLevel::className(), ['level_id' => 'education_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['edu_dhamma' => 'dhamma_id']);
    }
}
