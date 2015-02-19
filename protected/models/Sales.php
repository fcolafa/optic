<?php

/**
 * This is the model class for table "sales".
 *
 * The followings are the available columns in table 'sales':
 * @property integer $id_sales
 * @property integer $price
 * @property integer $pay
 * @property integer $status
 * @property string $type
 * @property integer $id_office
 * @property integer $id_client
 * @property string $date
 * @property integer $id_user
 * The followings are the available model relations:
 * @property Client $idClient
 * @property Office $idOffice
 * @property Users $idUser
 *
 */
class Sales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
         public $_officename;
         public $_clientname;
         public $_clientrut;
         public $_clientlname;
         public $_status;
         public $_username;
         public $_reportype;
         public $_reportyear;
        
         public function tableName()
	{
		return 'sales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_client, id_office, date, type', 'required'),
			array('id_client, id_office, id_user, id_frame' , 'numerical', 'integerOnly'=>true),
			array('pay, price, status' , 'numerical'),
                        array('type', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sales, id_client, id_office, type, pay, date,status, price, id_frame', 'safe', 'on'=>'search'),
                        array('_officename,_username, _clientname, _clientrut, _clientlname,id_user','safe','on'=>'search'),
                        array('pay','compare','compareAttribute'=>'price','operator'=>'<=','message'=>' El abono no puede ser mayor al precio'),
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
			'idClient' => array(self::BELONGS_TO, 'Client', 'id_client'),
                        'idFrame' => array(self::BELONGS_TO, 'Frames', 'id_frame'),
			'idOffice' => array(self::BELONGS_TO, 'Office', 'id_office'),
                        'idUser' => array(self::BELONGS_TO, 'Users', 'id_user'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sales' => Yii::t('database','Id Sales'),
			'id_client' => Yii::t('database','Id Client'),
			'id_office' => Yii::t('database','Id Office'),
			'date' => Yii::t('database','Date'),
			'price' => Yii::t('database','Price'),
                        'type' => Yii::t('database','Type'),
			'pay' => Yii::t('database','Pay'),
                        'status'=>  Yii::t('database','Status'),
                        '_reportype'=>Yii::t('database','Report Type'),
                        '_reportyear'=>Yii::t('database',' Report Year'),
                        'id_frame' => Yii::t('database','Id Frame'),
                        '_framename'=>Yii::t('database','Frame Name'),
                        
		);
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
                $criteria->with=array('idOffice','idClient','idUser');
                $criteria->together=true;

		$criteria->compare('id_sales',$this->id_sales);
		$criteria->compare('id_client',$this->id_client);
		$criteria->compare('id_office',$this->id_office);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('price',$this->price);
                $criteria->compare('type',$this->type,true);
		$criteria->compare('pay',$this->pay);
                $criteria->compare('status', $this->status);
              
                
                $criteria->compare('idOffice.office_name',$this->_officename, true);
                $criteria->compare('idClient.client_name',$this->_clientname, true);
                $criteria->compare('idClient.client_lastname',$this->_clientlname, true);
                $criteria->compare('idClient.client_rut',$this->_clientrut, true);
                $criteria->compare('idUser.user_name',$this->_username, true);
        

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
       
}
