<?php

namespace app\models;

use DateTime;
use Yii;

/**
 * This is the model class for table "current_data".
 *
 * @property int $current_id
 * @property string $citizen_no เลขบัตรประชาชน
 * @property string $book_no เลขหนังสือสุทธิ
 * @property string $current_name ชื่อปัจจุบัน
 * @property string $surname นามสกุล
 * @property string $cogname ฉายา
 * @property string $birthday วันเกิด
 * @property int $phansa_year พรรษา
 * @property string $wittayathana วิทยฐานะ
 * @property string $temple ชื่อวัด
 * @property string $sect สังกัดนิกาย
 * @property string $career อาชีพ
 * @property string $national สัญชาติ
 * @property string $father_name ชื่อพ่อ
 * @property string $mother_name ชื่อแม่
 * @property int $current_address ที่อยู่ปัจจุบัน
 *
 * @property Address $currentAddress
 * @property MainTable[] $mainTables
 */
class CurrentData extends \yii\db\ActiveRecord
{
    public $homeno;
    public $province;
    public $amphur;
    public $tambol;

    public static function tableName()
    {
        return 'current_data';
    }

    public function rules()
    {
        return [
            [['citizen_no', 'current_name', 'surname', 'birthday', 'temple', 'national', 'father_name', 'mother_name'], 'required'],
            [['birthday'], 'safe'],
            [['homeno','province','amphur','tambol','current_address'], 'safe'],
            [['phansa_year','current_address'], 'integer'],
            [['citizen_no'], 'string', 'max' => 13],
            [['book_no'], 'string', 'max' => 7],
            [['current_name', 'surname', 'cogname', 'temple'], 'string', 'max' => 100],
            [['wittayathana', 'sect'], 'string', 'max' => 50],
            [['career', 'national', 'father_name', 'mother_name'], 'string', 'max' => 45],
            [['citizen_no'], 'unique'],
            [['book_no'], 'unique'],
            //[['current_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['current_address' => 'address_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'current_id' => 'Current ID',
            'citizen_no' => 'เลขบัตรประชาชน',
            'book_no' => 'เลขหนังสือสุทธิ',
            'current_name' => 'ชื่อปัจจุบัน',
            'surname' => 'นามสกุล',
            'cogname' => 'ฉายา',
            'birthday' => 'วันเกิด',
            'phansa_year' => 'พรรษา',
            'wittayathana' => 'วิทยฐานะ',
            'temple' => 'ชื่อวัด',
            'sect' => 'สังกัดนิกาย',
            'career' => 'อาชีพ',
            'national' => 'สัญชาติ',
            'father_name' => 'ชื่อพ่อ',
            'mother_name' => 'ชื่อแม่',
            'current_address' => 'ที่อยู่ปัจจุบัน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getCurrentAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'current_address']);
    }

    public function getMainTables()
    {
        return $this->hasMany(MainTable::className(), ['current_id' => 'current_id']);
    }

    public function getAmphur($id){
        $datas = Amphur::find()->where(['PROVINCE_ID'=>$id])->all();
        return $this->MapData($datas,'AMPHUR_ID','AMPHUR_NAME');
    }
    public function getDistrict($id){
        $datas = Tambol::find()->where(['AMPHUR_ID'=>$id])->all();
        return $this->MapData($datas,'DISTRICT_ID','DISTRICT_NAME');
    }

    public function MapData($datas,$fieldId,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }

    public function getYear($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        return $date->format("Y");
    }

    public function getMyAge($pdate) {
        $date = DateTime::createFromFormat("Y-m-d", $pdate);
        $year = $date->format("Y");
        $now = new DateTime();
        $current_year = $now->format("Y");
        $age = $current_year - $year;
        return $age;
    }
}
