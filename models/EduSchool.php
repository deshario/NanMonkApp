<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "edu_school".
 *
 * @property int $school_id
 * @property string $school_name ชื่อโรงเรียน
 * @property int $school_level ระดับการศึกษา
 * @property int $school_address ที่อยู่ของโรงเรียน
 * @property string $school_transcript ไฟล์แนบ transcript
 *
 * @property Address $schoolAddress
 * @property EducationLevel $schoolLevel
 * @property Education[] $educations
 */
class EduSchool extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'edu_school';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['school_name', 'school_level', 'school_address'], 'required'],
            [['school_level', 'school_address'], 'integer'],
            [['school_name', 'school_transcript'], 'string', 'max' => 100],
            [['school_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['school_address' => 'address_id']],
            [['school_level'], 'exist', 'skipOnError' => true, 'targetClass' => EducationLevel::className(), 'targetAttribute' => ['school_level' => 'level_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'school_id' => 'School ID',
            'school_name' => 'ชื่อโรงเรียน',
            'school_level' => 'ระดับการศึกษา',
            'school_address' => 'ที่อยู่ของโรงเรียน',
            'school_transcript' => 'ไฟล์แนบ transcript',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'school_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchoolLevel()
    {
        return $this->hasOne(EducationLevel::className(), ['level_id' => 'school_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducations()
    {
        return $this->hasMany(Education::className(), ['edu_school' => 'school_id']);
    }
}
