<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "education_temp_trans".
 *
 * @property int $idedu ลำดับการศึกษาทางธรรม
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $education_level ระดับการศึกษาทางธรรม
 * @property string $temple ชื่อวัดที่ศึกษา
 * @property string $place สำนักเรียน
 * @property int $placeprovince สำนักเรียนคณะจังหวัด
 * @property string $attachfile เส้นทางการจัดเก็บไฟล์แนบ
 * @property int $address ที่อยู่ของสถานศึกษา
 *
 * @property Address $address0
 * @property EducationDhamma $educationLevel
 * @property PersonMaster $person
 */
class EducationTempTrans extends \yii\db\ActiveRecord
{
    public $province;
    public $amphur;
    public $tambol;

    const UPLOAD_FOLDER = 'uploads';

    public static function tableName()
    {
        return 'education_temp_trans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson','place','placeprovince'], 'required'],
            [['education_level', 'placeprovince', 'address'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['province','amphur','tambol','education_level','temple'], 'required'],
            [['temple'], 'string', 'max' => 100],
            [['place'], 'string', 'max' => 80],
            [['attachfile'], 'string', 'max' => 255],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address' => 'address_id']],
            [['education_level'], 'exist', 'skipOnError' => true, 'targetClass' => EducationDhamma::className(), 'targetAttribute' => ['education_level' => 'id_education']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idedu' => 'ลำดับการศึกษาทางธรรม',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'education_level' => 'ระดับการศึกษาทางธรรม',
            'temple' => 'ชื่อวัดที่ศึกษา',
            'place' => 'สำนักเรียน',
            'placeprovince' => 'สำนักเรียนคณะจังหวัด',
            'attachfile' => 'เส้นทางการจัดเก็บไฟล์แนบ',
            'address' => 'ที่อยู่ของสถานศึกษา',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'tambol' => 'ตำบล',
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
        return $this->hasOne(EducationDhamma::className(), ['id_education' => 'education_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }

    public function getEducationDhammaList(){
        $list = EducationDhamma::find()->orderBy('id_education')->all();
        return ArrayHelper::map($list,'id_education','education_name');
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/education/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/education/';
    }
}
