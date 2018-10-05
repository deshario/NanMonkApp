<?php

namespace app\models;

use Yii;

class EducationLevel extends \yii\db\ActiveRecord
{
    const EDU_SCHOOL = 1;
    const EDU_UNIVERSITY = 2;
    const EDU_DHAMMA = 3;

    public static function tableName()
    {
        return 'education_level';
    }

    public function rules()
    {
        return [
            [['level_name', 'level_type'], 'required'],
            [['level_type'], 'integer'],
            [['level_name'], 'string', 'max' => 100],
        ];
    }

    public function attributeLabels()
    {
        return [
            'level_id' => 'Level ID',
            'level_name' => 'ระดับการศึกษา',
            'level_type' => 'ชนิดสถาบัน',
        ];
    }

    public $strEducationLevel = [
        self::EDU_SCHOOL => 'โรงเรียน',
        self::EDU_UNIVERSITY => 'มหาวิทยาลัย',
        self::EDU_DHAMMA => 'ธรรมะ'
    ];

    public function getEducationLevel($status = null){
        if($status === null){
            return Yii::t('app',$this->strEducationLevel[$this->status]);
        }
        return Yii::t('app',$this->strEducationLevel[$status]);
    }
}
