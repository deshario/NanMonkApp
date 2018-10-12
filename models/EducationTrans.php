<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education_trans".
 *
 * @property int $idedu ลำดับการศึกษาทางโลก
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $education_level ระดับการศึกษาทางโลก
 * @property string $place ชื่อสถานศึกษา
 * @property string $major สาขาที่จบการศึกษา
 * @property string $year ปีการศึกษาที่จบ พ.ศ.
 * @property string $abbrev ชื่อย่อปริญญาบัตร
 * @property string $transcriptname ชื่อปริญญาบัตร
 * @property string $attachfile เส้นทางการจัดเก็บไฟล์แนบ
 * @property int $address ที่อยู่ของสถานศึกษา
 *
 * @property Address $address0
 * @property EducationStandard $educationLevel
 * @property PersonMaster $person
 */
class EducationTrans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'education_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson'], 'required'],
            [['education_level', 'address'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['place', 'transcriptname'], 'string', 'max' => 100],
            [['major'], 'string', 'max' => 45],
            [['year'], 'string', 'max' => 4],
            [['abbrev'], 'string', 'max' => 20],
            [['attachfile'], 'string', 'max' => 255],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address' => 'address_id']],
            [['education_level'], 'exist', 'skipOnError' => true, 'targetClass' => EducationStandard::className(), 'targetAttribute' => ['education_level' => 'id_education']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idedu' => 'ลำดับการศึกษาทางโลก',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'education_level' => 'ระดับการศึกษาทางโลก',
            'place' => 'ชื่อสถานศึกษา',
            'major' => 'สาขาที่จบการศึกษา',
            'year' => 'ปีการศึกษาที่จบ พ.ศ.',
            'abbrev' => 'ชื่อย่อปริญญาบัตร',
            'transcriptname' => 'ชื่อปริญญาบัตร',
            'attachfile' => 'เส้นทางการจัดเก็บไฟล์แนบ',
            'address' => 'ที่อยู่ของสถานศึกษา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAddress0()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationLevel()
    {
        return $this->hasOne(EducationStandard::className(), ['id_education' => 'education_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }
}
