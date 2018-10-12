<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education_standard".
 *
 * @property int $id_education ระดับการศึกษา
 * @property string $education_name 'ชื่อระดับการศึกษาทางโลก'
 *
 * @property EducationTrans[] $educationTrans
 */
class EducationStandard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'education_standard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['education_name'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_education' => 'ระดับการศึกษา',
            'education_name' => 'ชื่อระดับการศึกษาทางโลก',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationTrans()
    {
        return $this->hasMany(EducationTrans::className(), ['education_level' => 'id_education']);
    }
}
