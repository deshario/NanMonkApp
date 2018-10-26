<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "person_master".
 *
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $user_id
 * @property string $person_book_no หมายเลขหนังสือสุทธิ
 * @property string $person_pic รูปภาพ
 * @property int $prefix คำนำหน้า
 * @property string $firstname ชื่อ
 * @property string $surname นามสกุล
 * @property string $aliasname ฉายา
 * @property string $birthdate วันเดือนปีเกิด
 * @property int $staytemp จำนวนพรรษา
 * @property string $level วิทยฐานะ
 * @property string $temple วัด
 * @property string $homeno บ้านเลขที่, หมู่ที่, หมู่บ้าน
 * @property int $address ที่อยู่
 * @property string $section สังกัดนิกาย
 * @property int $idnationality รหัสสัญชาติ
 * @property string $occupation อาชีพ
 * @property string $quality สัณฐาน
 * @property string $color สีเนื้อ
 * @property string $special ตำหนิ
 * @property string $father ชื่อบิดา
 * @property string $mother ชื่อมารดา
 * @property string $family_homeno บ้านเลขที่, หมู่, หมู่บ้าน (ภูมิลำเนา)
 * @property int $family_address ที่อยู่ภูมิลำเนา
 */

class PersonMaster extends \yii\db\ActiveRecord
{
    public $province;
    public $amphur;
    public $tambol;

    public $province_phumlamnao;
    public $amphur_phumlamnao;
    public $tambol_phumlamnao;

    const PREFIX_SAMNER = 1;
    const PREFIX_PHRA = 2;

    const UPLOAD_FOLDER = 'uploads';

    public static function tableName()
    {
        return 'person_master';
    }

    public function rules()
    {
        return [
            [['idperson','person_book_no'], 'required'],
            [['amphur', 'tambol','idnationality'], 'required'],
            [['amphur_phumlamnao', 'tambol_phumlamnao','prefix'], 'required'],
            [['user_id', 'prefix', 'staytemp', 'address', 'idnationality', 'family_address'], 'integer'],
            [['birthdate'], 'safe'],
            [['province','amphur','tambol'], 'safe'],
            [['province_phumlamnao','amphur_phumlamnao','tambol_phumlamnao'], 'safe'],
            [['idperson'], 'string', 'max' => 13],

            [['person_book_no'], 'string', 'length' => [5, 10]],

            [['firstname', 'surname', 'homeno', 'section', 'father', 'mother', 'family_homeno'], 'string', 'max' => 60],

            [['firstname', 'surname', 'birthdate', 'father' ,'mother', 'family_homeno', 'province_phumlamnao'], 'required'],

            [['aliasname', 'special'], 'string', 'max' => 45],
            [['temple'], 'string', 'max' => 80],
            [['level'], 'string'],
            [['occupation', 'quality'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 10],

            [['idperson','person_book_no'], 'unique'],


            [['person_pic'], 'string', 'max' => 255],

//            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address' => 'address_id']],
//            [['family_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['family_address' => 'address_id']],
//            [['idnationality'], 'exist', 'skipOnError' => true, 'targetClass' => Nationality::className(), 'targetAttribute' => ['idnationality' => 'idnationality']],
//            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idperson' => 'หมายเลขบัตรประชาชน',
            'user_id' => 'User ID',
            'person_book_no' => 'หมายเลขหนังสือสุทธิ',
            'person_pic' => 'รูปภาพ',
            'firstname' => 'ชื่อ',
            'prefix' => 'คำนำหน้า',
            'surname' => 'นามสกุล',
            'aliasname' => 'ฉายา',
            'birthdate' => 'วันเดือนปีเกิด',
            'staytemp' => 'จำนวนพรรษา',
            'level' => 'วิทยฐานะ',
            'temple' => 'วัด',
            'homeno' => 'บ้านเลขที่, หมู่ที่, หมู่บ้าน',
            'address' => 'ที่อยู่',
            'section' => 'สังกัดนิกาย',
            'idnationality' => 'รหัสสัญชาติ',
            'occupation' => 'อาชีพ',
            'quality' => 'สัณฐาน',
            'color' => 'สีเนื้อ',
            'special' => 'ตำหนิ',
            'father' => 'ชื่อบิดา',
            'mother' => 'ชื่อมารดา',
            'family_homeno' => 'บ้านเลขที่, หมู่, หมู่บ้าน (ภูมิลำเนา)',
            'family_address' => 'ที่อยู่ภูมิลำเนา',

            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'tambol' => 'ตำบล',

            'province_phumlamnao' => 'จังหวัด(ภูมิลำเนา)',
            'amphur_phumlamnao' => 'อำเภอ(ภูมิลำเนา)',
            'tambol_phumlamnao' => 'ตำบล(ภูมิลำเนา)',
        ];
    }

    public $strPrefix = [
        self::PREFIX_SAMNER => 'ส.ณ',
        self::PREFIX_PHRA => 'พระ',
    ];

    public function getPrefix($prefix = null){
        if($prefix === null){
            return Yii::t('app',$this->strPrefix[$this->prefix]);
        }
        return Yii::t('app',$this->strPrefix[$prefix]);
    }

    public function getEducationTempTrans()
    {
        return $this->hasMany(EducationTempTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducationTrans()
    {
        return $this->hasMany(EducationTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHobbyTrans()
    {
        return $this->hasMany(HobbyTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMonkhoodMasters()
    {
        return $this->hasMany(MonkhoodMaster::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovetempleTrans()
    {
        return $this->hasMany(MovetempleTrans::className(), ['idperson' => 'idperson']);
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
    public function getFamilyAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'family_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationality()
    {
        return $this->hasOne(Nationality::className(), ['idnationality' => 'idnationality']);
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
    public function getPositionTrans()
    {
        return $this->hasMany(PositionTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromotionTrans()
    {
        return $this->hasMany(PromotionTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpecialworkTrans()
    {
        return $this->hasMany(SpecialworkTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaytempleTrans()
    {
        return $this->hasMany(StaytempleTrans::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrainingTrans()
    {
        return $this->hasMany(TrainingTrans::className(), ['idperson' => 'idperson']);
    }

    public function getAmphur($id){
        $datas = Amphur::find()->orderBy('AMPHUR_NAME')->where(['PROVINCE_ID'=>$id])->all();
        return $this->MapData($datas,'AMPHUR_ID','AMPHUR_NAME');
    }
    public function getDistrict($id){
        $datas = District::find()->orderBy('DISTRICT_NAME')->where(['AMPHUR_ID'=>$id])->all();
        return $this->MapData($datas,'DISTRICT_ID','DISTRICT_NAME');
    }
    public function MapData($datas,$fieldId,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }

    public function getNationalityLists(){
        $list = Nationality::find()->orderBy('idnationality')->all();
        return ArrayHelper::map($list,'idnationality','nationalityname');
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/avatars/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/avatars/';
    }

    public function initialPreview($fileName){
        $initial = [];
        if($fileName != null){
            $newFile = self::getUploadUrl().$fileName;
            $initial[] = Html::img($newFile,['class'=>'img-responsive']);
        }
        return $initial;
    }

}
