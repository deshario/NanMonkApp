<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\Url;

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
    public $province;
    public $amphur;
    public $tambol;

    const UPLOAD_FOLDER = 'uploads';

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
            [['idperson','place','major','place','year'], 'required'],
            [['education_level', 'address'], 'integer'],
            [['idperson'], 'string', 'max' => 13],
            [['place', 'transcriptname'], 'string', 'max' => 100],
            [['province','amphur','tambol','education_level'], 'required'],
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
            'year' => 'ปีการศึกษาที่จบ',
            'abbrev' => 'ชื่อย่อปริญญาบัตร',
            'transcriptname' => 'ชื่อปริญญาบัตร',
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
        return $this->hasOne(EducationStandard::className(), ['id_education' => 'education_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }

    public function getEducationStandardList(){
        $list = EducationStandard::find()->orderBy('id_education')->all();
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
    public function getAttachFile($citizen,$fileName){
        $file = self::getUploadPath().$citizen.'/'.$fileName;
        if(file_exists($file)){
            $download = Html::a('<code>ดาวน์โหลด</code>',['/education-trans/download',
                    'id'=>$this->idedu,
                    'citizen'=>$citizen,
                    'fileName'=>$fileName,
                    ]);
        }else{
            $download = '<code>'.Html::a('<code><i>ไม่พบ</i></code>').'</code>';
        }
        return $download;
    }

    public function initialPreview($fileName){
        $initial = [];
        if($fileName != null){
            $newFile = self::getUploadUrl().$this->person->idperson.'/'.$fileName;
            $initial[] = Html::img($newFile,['class'=>'img-responsive']);
        }
        return $initial;
    }
}
