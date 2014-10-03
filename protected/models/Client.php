<?php

/**
 * This is the model class for table "client".
 *
 * The followings are the available columns in table 'client':
 * @property integer $id_client
 * @property string $client_name
 * @property string $client_lastname
 * @property string $client_rut
 * @property integer $client_phone
 * @property double $righteye_sphere
 * @property double $righteye_cylinder
 * @property integer $righteye_axis
 * @property double $lefteye_sphere
 * @property double $lefteye_cylinder
 * @property integer $lefteye_axis
 * @property double $addition
 * @property double $height
 * @property string $comment
 * @property integer $pupillary_distance
 *
 * The followings are the available model relations:
 * @property Sales[] $sales
 */
class Client extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_name, client_lastname, client_rut', 'required'),
			array('client_phone, pupillary_distance', 'numerical', 'integerOnly'=>true),
			array('addition, height', 'numerical'),
                        array('righteye_sphere, righteye_cylinder, lefteye_sphere, lefteye_cylinder','numerical','max'=>30,'min'=>-30),
                        array(' righteye_axis, lefteye_axis','numerical','integerOnly'=>true,'min'=>0,'max'=>359),
			array('client_name, client_lastname', 'length', 'max'=>45),
			array('client_rut', 'length', 'max'=>20),
                        array('client_rut', 'unique'),
			array('comment', 'safe'),
                        array('client_rut','validateRut','allowEmpty'=>'false'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_client, client_name, client_lastname, client_rut, client_phone, righteye_sphere, righteye_cylinder, righteye_axis, lefteye_sphere, lefteye_cylinder, lefteye_axis, addition, height, comment, pupillary_distance', 'safe', 'on'=>'search'),
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
			'sales' => array(self::HAS_MANY, 'Sales', 'id_client'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_client' => Yii::t('database','Id Client'),
			'client_name' => Yii::t('database','Client Name'),
			'client_lastname' => Yii::t('database','Client Lastname'),
			'client_rut' => Yii::t('database','Client Rut'),
			'client_phone' => Yii::t('database','Client Phone'),
			'righteye_sphere' => Yii::t('database','Righteye Sphere'),
			'righteye_cylinder' => Yii::t('database','Righteye Cylinder'),
			'righteye_axis' => Yii::t('database','Righteye Axis'),
			'lefteye_sphere' => Yii::t('database','Lefteye Sphere'),
			'lefteye_cylinder' => Yii::t('database','Lefteye Cylinder'),
			'lefteye_axis' => Yii::t('database','Lefteye Axis'),
			'addition' => Yii::t('database','Addition'),
			'height' => Yii::t('database','Height'),
			'comment' => Yii::t('database','Comment'),
			'pupillary_distance' => Yii::t('database','Pupillary Distance'),
                        'Forces'=>'Fuerza',
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

		$criteria->compare('id_client',$this->id_client);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('client_lastname',$this->client_lastname,true);
		$criteria->compare('client_rut',$this->client_rut,true);
		$criteria->compare('client_phone',$this->client_phone);
		$criteria->compare('righteye_sphere',$this->righteye_sphere);
		$criteria->compare('righteye_cylinder',$this->righteye_cylinder);
		$criteria->compare('righteye_axis',$this->righteye_axis);
		$criteria->compare('lefteye_sphere',$this->lefteye_sphere);
		$criteria->compare('lefteye_cylinder',$this->lefteye_cylinder);
		$criteria->compare('lefteye_axis',$this->lefteye_axis);
		$criteria->compare('addition',$this->addition);
		$criteria->compare('height',$this->height);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('pupillary_distance',$this->pupillary_distance);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Client the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public function validateRut($attribute, $params) {
            
            $data = explode('-', $this->client_rut);
            $evaluate = strrev($data[0]);
            $multiply = 2;
            $store = 0;
            for ($i = 0; $i < strlen($evaluate); $i++) {
                $store += $evaluate[$i] * $multiply;
                $multiply++;
                if ($multiply > 7)
                    $multiply = 2;
            }
            
            isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
            $result = 11 - ($store % 11);
            if ($result == 10)
                $result = 'k';
            if ($result == 11)
                $result = 0;
            if ($verifyCode != $result ||!is_numeric($data[0]))
                $this->addError('rut', Yii::t('validation','Invalid Rut'));
        }
}
