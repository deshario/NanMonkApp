<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property int $education_id
 * @property int $user_id ผู้ใช้งาน
 * @property int $edu_school โรงเรียน
 * @property int $edu_university มหาลัย
 * @property int $edu_dhamma ธรรมะ
 *
 * @property EduDhamma $eduDhamma
 * @property EduSchool $eduSchool
 * @property EduUniversity $eduUniversity
 * @property User $user
 * @property MainTable[] $mainTables
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'edu_school', 'edu_university', 'edu_dhamma'], 'required'],
            [['user_id', 'edu_school', 'edu_university', 'edu_dhamma'], 'integer'],
            [['edu_dhamma'], 'exist', 'skipOnError' => true, 'targetClass' => EduDhamma::className(), 'targetAttribute' => ['edu_dhamma' => 'dhamma_id']],
            [['edu_school'], 'exist', 'skipOnError' => true, 'targetClass' => EduSchool::className(), 'targetAttribute' => ['edu_school' => 'school_id']],
            [['edu_university'], 'exist', 'skipOnError' => true, 'targetClass' => EduUniversity::className(), 'targetAttribute' => ['edu_university' => 'university_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'education_id' => 'Education ID',
            'user_id' => 'ผู้ใช้งาน',
            'edu_school' => 'โรงเรียน',
            'edu_university' => 'มหาลัย',
            'edu_dhamma' => 'ธรรมะ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEduDhamma()
    {
        return $this->hasOne(EduDhamma::className(), ['dhamma_id' => 'edu_dhamma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEduSchool()
    {
        return $this->hasOne(EduSchool::className(), ['school_id' => 'edu_school']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEduUniversity()
    {
        return $this->hasOne(EduUniversity::className(), ['university_id' => 'edu_university']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['education_id' => 'education_id']);
    }
}
