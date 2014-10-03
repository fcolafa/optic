<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id_user
 * @property string $user_name
 * @property string $password
 * @property string $session
 * @property string $role
 * @property string $date_create
 * @property string $email
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        
        public $password_repeat;
        public $_oldpassword;
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
			array('user_name, password, password_repeat, email', 'required'),
                        array('_oldpassword,password, password_repeat','required' ,'on'=>'update'),
                        array('user_name','unique'),
			array('user_name, password, session, role, email', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_user,user_name, password, session, role, date_create, email', 'safe', 'on'=>'search'),
                        array('email','email'),
                        array('password', 'compare'),
                        array('password_repeat', 'safe'),
                        array('_oldpassword','updatePassword','on'=>'update'),
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
                    'sessions' => array(self::HAS_MANY, 'Session', 'id_user'),
		);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_user' => Yii::t('database','Id User'),
			'user_name' => Yii::t('database','User Name'),
			'password' => Yii::t('database','Password'),
			'session' => Yii::t('database','Session'),
			'role' => Yii::t('database','Role'),
			'date_create' => Yii::t('database','Date Create'),
			'email' => Yii::t('database','Email'),
                        'password_repeat'=>Yii::t('database','Repeat Password'),
                        '_oldpassword'=>  Yii::t('database','Old Password'),
		);
	}
        public function validatePassword($password)
        {
            return $this->hashPassword($password,$this->session)===$this->password;
        }
        public function hashPassword($password,$salt){
            return md5($salt.$password);
        } 
        public function generateSalt(){
            return uniqid('',true);
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
		$criteria->compare('id_user',$this->id_user);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('date_Create',$this->date_create,true);
		$criteria->compare('email',$this->email,true);
                $criteria->compare('role',$this->role,true);

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
        public function updatePassword($attribute, $params) {
	    
           $user=  Users::model()->findByPk($this->id_user);
           if (md5($this->_oldpassword)!=$user->password){
	        $this->addError($attribute, Yii::t('validation','Wrong Password'));
	    }
	}
}
