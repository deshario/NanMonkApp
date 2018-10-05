<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $Tpassword;
    public $confirm_password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 8],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            [['Tpassword','confirm_password'], 'required'],
            [['Tpassword','confirm_password'], 'string', 'min' => 6],

            ['confirm_password','compare','compareAttribute' => 'Tpassword']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'Tpassword' => 'Password'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = "deshario"; // It'll be not valid because its temp variable of user model
        $user->status = \app\models\User::STATUS_ACTIVE;
        $user->setPassword($this->Tpassword);
        $user->generateAuthKey();
        $user->created_at = time();
        $user->updated_at = time();
        if($user->save()){
            $main = new MainTable();
            $main->user_id = $user->id;
            $main->save();
         return $user;
        }else{
            return null;
        }
        //return $status ? $user : null;
    }
}