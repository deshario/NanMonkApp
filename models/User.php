<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username ชื่อผู้ใช้งาน
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $phone เบอร์โทรลูกค้า
 * @property string $email เมล
 * @property int $status สถานะ
 * @property int $created_at วันที่สมัคร
 * @property int $updated_at วันที่ปรับปรุงข้อมูลล่าสุด
 *
 * @property Booking[] $bookings
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    const ROLE_USER = 10;
    const ROLE_ADMIN = 20;

    public $password;

    public $no_users;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],

            ['roles', 'default', 'value' => self::ROLE_USER],
            ['roles', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],

            [['username', 'email',], 'required'],
            //[['no_users'], 'required'],
            [['status', 'roles', 'created_at', 'updated_at'], 'integer'],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'string', 'max' => 8],
            [['no_users'], 'integer', 'max' => 5],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],

            //['worked_at', 'required'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'ชื่อผู้ใช้',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'อีเมล์',
            'status' => 'สถานะ',
            'roles' => 'บทบาท',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'no_users' => 'จำนวนผู้ใช้งานที่ต้องการ',
            'password' => 'รหัสผ่าน',
        ];
    }

    public $strStatus = [
        self::STATUS_DELETED => 'ปิดการใช้งาน',
        self::STATUS_ACTIVE => 'เปิดการใช้งาน'
    ];

    public function getStatus($status = null){
        if($status === null){
            return Yii::t('app',$this->strStatus[$this->status]);
        }
        return Yii::t('app',$this->strStatus[$status]);
    }

    public $strRoles = [
        self::ROLE_USER => 'ผู้ใช้งาน',
        self::ROLE_ADMIN => 'ผู้ดูแลระบบ'
    ];

    public function getRoles($roles = null){
        if($roles === null){
            return Yii::t('app',$this->strRoles[$this->roles]);
        }
        return Yii::t('app',$this->strRoles[$roles]);
    }

//    public function getBookings()
//    {
//        return $this->hasMany(Booking::className(), ['booked_by' => 'id']);
//    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function hashPassword($password) {
        return Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => [self::STATUS_ACTIVE,self::STATUS_DELETED]]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
