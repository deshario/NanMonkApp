<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "promotion_trans".
 *
 * @property int $idpos ลำดับสมณศักดิ์ที่ได้รับ
 * @property string $idperson หมายเลขบัตรประชาชน
 * @property int $idpromotion ระดับตำแหน่งสมณศักดิ์
 * @property string $promotiondate ได้รับเมื่อวันที่
 * @property string $place1 ราชทินนาม หรื่อ ที่
 * @property string $place2 ฐานานุกรมใน
 * @property string $temple ชื่อวัดประจำตำแหน่ง
 * @property int $temple_address ที่อยู่ของวัดที่ได้รับตำแหน่ง
 * @property string $year ปี พ.ศ. เมื่อได้รับตำแหน่งเช่น พระครูปลัดของสมเด็จพระราชาคณะ, พระครู...
 * @property string $remark หมายเหตุหรือเพิ่มเติมข้อมูล หรือตำแหน่งอื่นๆ 
 * @property string $attachfile เส้นทางการจัดเก็บไฟล์แนบ
 *
 * @property Address $templeAddress
 * @property PersonMaster $person
 * @property Promotion $promotion
 */
class PromotionTrans extends \yii\db\ActiveRecord
{
    public $province;
    public $amphur;
    public $tambol;

    const UPLOAD_FOLDER = 'uploads';

    public static function tableName()
    {
        return 'promotion_trans';
    }

    public function rules()
    {
        return [
            [['idperson','idpromotion','promotiondate'], 'required'],
            [['idpromotion', 'temple_address'], 'integer'],
            [['promotiondate', 'year'], 'safe'],
            [['idperson'], 'string', 'max' => 13],
            [['province','amphur','tambol'], 'required'],
            [['place1', 'place2', 'temple'], 'string', 'max' => 80],
            [['remark'], 'string', 'max' => 100],
            [['attachfile'], 'string', 'max' => 255],
            [['temple_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::className(), 'targetAttribute' => ['temple_address' => 'address_id']],
            [['idperson'], 'exist', 'skipOnError' => true, 'targetClass' => PersonMaster::className(), 'targetAttribute' => ['idperson' => 'idperson']],
            [['idpromotion'], 'exist', 'skipOnError' => true, 'targetClass' => Promotion::className(), 'targetAttribute' => ['idpromotion' => 'idpromotion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpos' => 'ลำดับสมณศักดิ์ที่ได้รับ',
            'idperson' => 'หมายเลขบัตรประชาชน',
            'idpromotion' => 'ระดับตำแหน่งสมณศักดิ์',
            'promotiondate' => 'ได้รับเมื่อวันที่',
            'place1' => 'ราชทินนาม หรื่อ ที่',
            'place2' => 'ฐานานุกรมใน',
            'temple' => 'ชื่อวัดประจำตำแหน่ง',
            'temple_address' => 'ที่อยู่ของวัดที่ได้รับตำแหน่ง',
            'year' => 'ได้รับเมือวันที่',
            'remark' => 'หมายเหตุหรือเพิ่มเติมข้อมูล หรือตำแหน่งอื่นๆ ',
            'attachfile' => 'เส้นทางการจัดเก็บไฟล์แนบ',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'tambol' => 'ตำบล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTempleAddress()
    {
        return $this->hasOne(Address::className(), ['address_id' => 'temple_address']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(PersonMaster::className(), ['idperson' => 'idperson']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromotion()
    {
        return $this->hasOne(Promotion::className(), ['idpromotion' => 'idpromotion']);
    }

    public function getPromotionList(){
        $list = Promotion::find()->orderBy('idpromotion')->all();
        return ArrayHelper::map($list,'idpromotion','promotionname');
    }

    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/promotion/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/promotion/';
    }
}
