<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $display_name
 * @property integer $roles
 * @property string $lastAccessTime
 * @property string $lastIPAccess
 * @property integer $isBlock
 * @property string $createDate
 * @property integer $createBy
 * @property string $avatar
 * @property integer $id
 * @property integer $phone
 */
class Users extends CActiveRecord
{
	public $rememberMe;
	public $confirmPassword;
	public $newEmail;
	public $confirmNewEmail;
	public $currentPassword;
	public $newPassword;
	public $confirmNewPassword;
	private $_identity;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('isBlock, createBy, phone', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>50),
			array('email, password, display_name', 'length', 'max'=>255),
			array('lastIPAccess', 'length', 'max'=>20),
			array('avatar', 'length', 'max'=>500),
			array('lastAccessTime, createDate', 'safe'),
			// dang ky
			array('username, confirmPassword, password,display_name, email', 'required', 'message'=>'{attribute} không du?c d? tr?ng', 'on'=>'register'),
			array('email', 'email', 'message'=>'{attribute} không dúng d?nh d?ng', 'on'=>'register'),
	    	array('username, email', 'unique', 'message'=>'{attribute} dã du?c s? d?ng', 'on'=>'register'),
			array('username', 'match', 'not'=>true, 'pattern' => '/[^a-zA-Z0-9]/', 'message' => 'Ngu?i dùng ch? du?c s? d?ng ch? cái không d?u, kí t? hoa, kí t? thu?ng và kí t? s?', 'on'=>'register'),
			//array('phone, mobilephone', 'match', 'pattern'=>'/^[0-9-()\s+]+$/'),
			array('confirmPassword', 'compare', 'compareAttribute'=>'password', 'message' => "{attribute} không chính xác", 'on'=>'register'),
			array('confirmPassword', 'safe'),
			// ChangePassword rule
			array('currentPassword, newPassword, confirmNewPassword', 'required', 'message'=>'{attribute} không du?c d? tr?ng', 'on'=>'changePassword'),
			// array('currentPassword', 'checkPassword', 'on'=>'changePassword'),
			array('confirmNewPassword', 'compare', 'compareAttribute'=>'newPassword', 'message' => "{attribute} không chính xác", 'on'=>'changePassword'),
			array('confirmPassword', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('username, email, password, display_name, roles, lastAccessTime, lastIPAccess, isBlock, createDate, createBy, avatar, id, phone', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}
	// kiem tra phan quyen nguoi dung, 0 la nguoi dung, 1 la admin
	public function isUsers($id)
	{
		if (Yii::app()->user->isGuest) {
			return -1;
		}
        if(!isset($id)){
            return -1;
        }
		$user = Users::model()->findByPk($id);
		return $user->roles;
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'display_name' => 'Full Name',
			'roles' => 'Roles',
			'lastAccessTime' => 'Last Access Time',
			'lastIPAccess' => 'Last Ipaccess',
			'isBlock' => 'Is Block',
			'createDate' => 'Create Date',
			'createBy' => 'Create By',
			'avatar' => 'Avatar',
			'id' => 'id',
			'phone' => 'Phone',
		);
	}
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new Useridentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===Useridentity::ERROR_NONE)
		{

			$duration=  0; // 30 days
			if($this->rememberMe == 1){
				$duration= 3600*24*30 ; // 30 days
			}
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('roles',$this->roles);
		$criteria->compare('lastAccessTime',$this->lastAccessTime,true);
		$criteria->compare('lastIPAccess',$this->lastIPAccess,true);
		$criteria->compare('isBlock',$this->isBlock);
		$criteria->compare('createDate',$this->createDate,true);
		$criteria->compare('createBy',$this->createBy);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('phone',$this->phone);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    // function get name
    public function getName($id){
        $model = Users::model()->findByPk($id);
        if($model===null){
			throw new CHttpException(404,'The requested page does not exist.');
        }else{
            return $model->username;
        }
            
    }
}
