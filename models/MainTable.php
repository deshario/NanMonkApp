<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_table".
 *
 * @property int $main_id
 * @property int $user_id ข้อมูลผู้ใช้งาน
 * @property int $current_id ข้อมูลปัจจุบัน
 * @property int $banpacha_id ประวัติการบรรพชา
 * @property int $woopasombod_id ประวัติการอุปสมบท
 * @property int $champhansa_id ประวัติการจำพรรษา
 * @property int $education_id ประวัติการศึกษา
 * @property int $rank_id ตำแหน่งทางคณะสงฆ์
 * @property int $samanasak_id ลำดับสมัณศิกดิ์ที่ได้รับ
 * @property int $training_id ประวัติการอบรม
 * @property int $talent_id ความสามารถพิเศษ
 * @property int $portfolio_id ผลงานที่สำคัญ
 *
 * @property BanpachaData $banpacha
 * @property Champhansa $champhansa
 * @property CurrentData $current
 * @property Education $education
 * @property Portfolio $portfolio
 * @property Rank $rank
 * @property Samanasak $samanasak
 * @property Talent $talent
 * @property Training $training
 * @property User $user
 * @property Woopasombod $woopasombod
 */
class MainTable extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_table';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'current_id', 'banpacha_id', 'woopasombod_id', 'champhansa_id', 'education_id', 'rank_id', 'samanasak_id', 'training_id', 'talent_id', 'portfolio_id'], 'integer'],
            [['user_id'], 'unique'],
            [['banpacha_id'], 'exist', 'skipOnError' => true, 'targetClass' => BanpachaData::className(), 'targetAttribute' => ['banpacha_id' => 'banpacha_id']],
            [['champhansa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Champhansa::className(), 'targetAttribute' => ['champhansa_id' => 'champhansa_id']],
            [['current_id'], 'exist', 'skipOnError' => true, 'targetClass' => CurrentData::className(), 'targetAttribute' => ['current_id' => 'current_id']],
            [['education_id'], 'exist', 'skipOnError' => true, 'targetClass' => Education::className(), 'targetAttribute' => ['education_id' => 'education_id']],
            [['portfolio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Portfolio::className(), 'targetAttribute' => ['portfolio_id' => 'portfolio_id']],
            [['rank_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rank::className(), 'targetAttribute' => ['rank_id' => 'rank_id']],
            [['samanasak_id'], 'exist', 'skipOnError' => true, 'targetClass' => Samanasak::className(), 'targetAttribute' => ['samanasak_id' => 'samanasak_id']],
            [['talent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Talent::className(), 'targetAttribute' => ['talent_id' => 'talent_id']],
            [['training_id'], 'exist', 'skipOnError' => true, 'targetClass' => Training::className(), 'targetAttribute' => ['training_id' => 'training_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['woopasombod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Woopasombod::className(), 'targetAttribute' => ['woopasombod_id' => 'woopasombod_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'main_id' => 'Main ID',
            'user_id' => 'ข้อมูลผู้ใช้งาน',
            'current_id' => 'ข้อมูลปัจจุบัน',
            'banpacha_id' => 'ประวัติการบรรพชา',
            'woopasombod_id' => 'ประวัติการอุปสมบท',
            'champhansa_id' => 'ประวัติการจำพรรษา',
            'education_id' => 'ประวัติการศึกษา',
            'rank_id' => 'ตำแหน่งทางคณะสงฆ์',
            'samanasak_id' => 'ลำดับสมัณศิกดิ์ที่ได้รับ',
            'training_id' => 'ประวัติการอบรม',
            'talent_id' => 'ความสามารถพิเศษ',
            'portfolio_id' => 'ผลงานที่สำคัญ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBanpacha()
    {
        return $this->hasOne(BanpachaData::className(), ['banpacha_id' => 'banpacha_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChamphansa()
    {
        return $this->hasOne(Champhansa::className(), ['champhansa_id' => 'champhansa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrent()
    {
        return $this->hasOne(CurrentData::className(), ['current_id' => 'current_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEducation()
    {
        return $this->hasOne(Education::className(), ['education_id' => 'education_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['portfolio_id' => 'portfolio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRank()
    {
        return $this->hasOne(Rank::className(), ['rank_id' => 'rank_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSamanasak()
    {
        return $this->hasOne(Samanasak::className(), ['samanasak_id' => 'samanasak_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTalent()
    {
        return $this->hasOne(Talent::className(), ['talent_id' => 'talent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTraining()
    {
        return $this->hasOne(Training::className(), ['training_id' => 'training_id']);
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
    public function getWoopasombod()
    {
        return $this->hasOne(Woopasombod::className(), ['woopasombod_id' => 'woopasombod_id']);
    }
}
