<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education_dhamma".
 *
 * @property int $id_education รหัสระดับการศึกษาทางธรรม
 * @property string $education_name ชื่อระดับการศึกษาทางธรรม
 *
 * @property EducationTempTrans[] $educationTempTrans
 */
class EducationDhamma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'education_dhamma';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['education_name'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_education' => 'รหัสระดับการศึกษาทางธรรม',
            'education_name' => 'ชื่อระดับการศึกษาทางธรรม',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationTempTrans()
    {
        return $this->hasMany(EducationTempTrans::className(), ['education_level' => 'id_education']);
    }
}
