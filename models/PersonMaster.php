<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "person_master".
 *
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $user_id
 * @property string $person_book_no หมายเลขหนังสือสุทธิ
 * @property string $person_pic รูปภาพ
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
 *
 * @property EducationTempTrans[] $educationTempTrans
 * @property EducationTrans[] $educationTrans
 * @property HobbyTrans[] $hobbyTrans
 * @property MonkhoodMaster[] $monkhoodMasters
 * @property MovetempleTrans[] $movetempleTrans
 * @property Address $address0
 * @property Address $familyAddress
 * @property Nationality $nationality
 * @property User $user
 * @property PositionTrans[] $positionTrans
 * @property PromotionTrans[] $promotionTrans
 * @property SpecialworkTrans[] $specialworkTrans
 * @property StaytempleTrans[] $staytempleTrans
 * @property TrainingTrans[] $trainingTrans
 */
class PersonMaster extends \yii\db\ActiveRecord
{
    public $province;
    public $amphur;
    public $tambol;

    public $province_phumlamnao;
    public $amphur_phumlamnao;
    public $tambol_phumlamnao;

    public static function tableName()
    {
        return 'person_master';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idperson', 'person_pic'], 'required'],
            [['amphur', 'tambol'], 'required'],
            [['amphur_phumlamnao', 'tambol_phumlamnao'], 'required'],
            //['person_pic', 'image', 'minWidth' => 250, 'maxWidth' => 250,'minHeight' => 250, 'maxHeight' => 250, 'extensions' => 'jpg,png', 'maxSize' => 1024 * 1024 * 2],
            [['user_id', 'staytemp', 'address', 'idnationality', 'family_address'], 'integer'],
            [['birthdate'], 'safe'],
            [['province','amphur','tambol'], 'safe'],
            [['province_phumlamnao','amphur_phumlamnao','tambol_phumlamnao'], 'safe'],
            [['idperson'], 'string', 'max' => 13],
            [['person_book_no'], 'string', 'max' => 5],
            [['person_pic'], 'string', 'max' => 255],
            [['firstname', 'surname', 'homeno', 'section', 'father', 'mother', 'family_homeno'], 'string', 'max' => 60],
            [['aliasname', 'level', 'special'], 'string', 'max' => 45],
            [['temple'], 'string', 'max' => 80],
            [['occupation', 'quality'], 'string', 'max' => 50],
            [['color'], 'string', 'max' => 10],
            [['idperson'], 'unique'],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['address' => 'address_id']],
            [['family_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['family_address' => 'address_id']],
            [['idnationality'], 'exist', 'skipOnError' => true, 'targetClass' => Nationality::className(), 'targetAttribute' => ['idnationality' => 'idnationality']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
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
        $datas = Amphur::find()->where(['PROVINCE_ID'=>$id])->all();
        return $this->MapData($datas,'AMPHUR_ID','AMPHUR_NAME');
    }
    public function getDistrict($id){
        $datas = District::find()->where(['AMPHUR_ID'=>$id])->all();
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

}
