<?php

/**
 * This is the model class for table "office".
 *
 * The followings are the available columns in table 'office':
 * @property integer $id_office
 * @property integer $id_city
 * @property integer $id_zone
 * @property string $office_name
 * @property string $office_address
 *
 * The followings are the available model relations:
 * @property City $idCity
 * @property Zone $idZone
 * @property Sales[] $sales
 */
class Office extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $_zonename;
        public $_cityname;
        public function tableName()
	{
		return 'office';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_city, id_zone, office_name', 'required'),
                        array('id_city, id_zone', 'numerical', 'integerOnly'=>true),
			array('office_name,office_address', 'length', 'max'=>45),
                        array('office_name','unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
                        array('id_office, id_city, id_zone, office_name', 'safe', 'on'=>'search'),
			array('_zonename,_cityname', 'safe', 'on'=>'search'),
                     
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
			'idCity' => array(self::BELONGS_TO, 'City', 'id_city'),
			'idZone' => array(self::BELONGS_TO, 'Zone', 'id_zone'),
			'sales' => array(self::HAS_MANY, 'Sales', 'id_office'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_office' => Yii::t('database','Id Office'),
			'id_city' => Yii::t('database','Id City'),
			'id_zone' => Yii::t('database','Id Zone'),
			'office_name' => Yii::t('database','Office Name'),
                        'office_address' => Yii::t('database','Office Address'),
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
                $criteria->with=array('idCity','idZone');
                $criteria->together=true;
                

		$criteria->compare('id_office',$this->id_office);
		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('id_zone',$this->id_zone);
		$criteria->compare('office_name',$this->office_name,true);
                $criteria->compare('office_address',$this->office_name,true);
                
                $criteria->compare('idZone.zone_name', $this->_zonename,true);
                $criteria->compare('idCity.city_name', $this->_cityname,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Office the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
