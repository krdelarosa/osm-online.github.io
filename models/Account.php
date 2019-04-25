<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oms_db.accounts".
 *
 * @property int $acc_id
 * @property int $u_id
 * @property string $u_name
 * @property string $u_password
 * @property string $u_type
 */
class Account extends \app\models\AccountBase implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oms_db.accounts';
    }

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['u_id', 'u_name', 'u_password', 'u_type'], 'required'],
            [['u_id'], 'integer'],
            [['u_name', 'u_password', 'u_type'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'acc_id' => 'Account ID',
            'u_id' => 'User ID',
            'u_name' => 'Username',
            'u_password' => 'Password',
            'u_type' => 'User Type',
        ];
    }

    public function login()
    {
        $users = Account::findAll(['u_name'=>$this->u_name]);
        \ChromePhp::log('login():'.$this->u_name);
        \ChromePhp::log('login()-:'.$this->u_password);

        if(count($users)==0){
            return false;
        }
        else{
            Yii::$app->user->login($users[0]);
            $this->u_id = $users[0]->u_id;
            return $this->validateAccount($users);
        }
       
    }

    public function validateAccount($users){
        #assuming username and password are unique

        if ($users[0]->u_name == $this->u_name AND $users[0]->u_password == $this->u_password){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->u_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    
}
