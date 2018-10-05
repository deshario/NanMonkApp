<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edu_university".
 *
 * @property int $university_id
 * @property string $university_name ชื่อมหาลัย
 * @property int $university_level ระดับการศึกษา
 * @property int $university_address ที่อยู่ของมหาลัย
 * @property string $university_transcript ไฟล์แนบ transcript
 *
 * @property Address $universityAddress
 * @property EducationLevel $universityLevel
 * @property Education[] $educations
 */
class EduUniversity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_university';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['university_id', 'university_name', 'university_level', 'university_address'], 'required'],
            [['university_id', 'university_level', 'university_address'], 'integer'],
            [['university_name'], 'string', 'max' => 45],
            [['university_transcript'], 'string', 'max' => 100],
            [['university_id'], 'unique'],
            [['university_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['university_address' => 'address_id']],
            [['university_level'], 'exist', 'skipOnError' => true, 'targetClass' => EducationLevel::className(), 'targetAttribute' => ['university_level' => 'level_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'university_id' => 'University ID',
            'university_name' => 'ชื่อมหาลัย',
            'university_level' => 'ระดับการศึกษา',
            'university_address' => 'ที่อยู่ของมหาลัย',
            'university_transcript' => 'ไฟล์แนบ transcript',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'university_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUniversityLevel()
    {
        return $this->hasOne(EducationLevel::className(), ['level_id' => 'university_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['edu_university' => 'university_id']);
    }
}
