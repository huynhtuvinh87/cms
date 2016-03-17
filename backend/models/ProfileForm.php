<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class ProfileForm extends Model {

    public $username;
    public $email;
    public $firstname;
    public $lastname;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['username', 'firstname', 'lastname'], 'required', 'message' => '{attribute} không được rỗng.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [['email', 'firstname', 'lastname'], 'string', 'max' => 255],
//            ['email', 'validateEmail'],
//            ['username', 'validateUsername']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'username' => 'Tên đăng nhập',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'firstname' => 'Họ',
            'lastname' => 'Tên'
        ];
    }

//    public function validateUsername($attribute) {
//        if (!$this->hasErrors()) {
//            $model = User::find()->where(['username' => $this->username])->one();
//            if (!empty($model)) {
//                if ($model->username != $this->username)
//                    $this->addError($attribute, $this->username . ' đã tồn tại trong hệ thống.');
//            }
//        }
//    }
//
//    public function validateEmail($attribute) {
//        if (!$this->hasErrors()) {
//            $model = User::find()->where(['email' => $this->email])->one();
//            if (!empty($model)) {
//                if ($model->email != $this->email)
//                    $this->addError($attribute, $this->email . ' đã tồn tại trong hệ thống.');
//            }
//        }
//    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function profile() {
        if ($this->validate()) {
            var_dump('123'); exit;
            $user = User::findOne(\Yii::$app->user->id);
            $user->username = $this->username;
            $user->email = $this->email;
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }

}
