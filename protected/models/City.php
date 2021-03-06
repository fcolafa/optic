<?php

/**
 * This is the model class for table "city".
 *
 * The followings are the available columns in table 'city':
 * @property integer $id_city
 * @property integer $id_zone
 * @property string $city_name
 *
 * The followings are the available model relations:
 * @property Zone $idZone
 * @property Office[] $offices
 */
class City extends CActiveRecord
{
	/**
	 * @return string the associated database table name
         * 
	 */
        public $_zonename;
	public function tableName()
	{
		return 'city';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_zone, city_name', 'required'),
			array('id_zone', 'numerical', 'integerOnly'=>true),
			array('city_name', 'length', 'max'=>45),
                        array('city_name', 'unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_city, id_zone, city_name', 'safe', 'on'=>'search'),
                        array('_zonename','safe', 'on'=>'search'),
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
			'idZone' => array(self::BELONGS_TO, 'Zone', 'id_zone'),
			'offices' => array(self::HAS_MANY, 'Office', 'id_city'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_city' => Yii::t('database','Id City'),
			'id_zone' => Yii::t('database','Id Zone'),
			'city_name' => Yii::t('database','City Name'),
                        '_zonename'=>Yii::t('database','Zone Name'),
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
                $criteria->with=array('idZone');
                $criteria->together=true;

		$criteria->compare('id_city',$this->id_city);
		$criteria->compare('id_zone',$this->id_zone);
		$criteria->compare('city_name',$this->city_name,true);
                $criteria->compare('idZone.zone_name', $this->_zonename,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return City the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
