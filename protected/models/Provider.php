<?php

/**
 * This is the model class for table "provider".
 *
 * The followings are the available columns in table 'provider':
 * @property integer $id_provider
 * @property string $provider_name
 * @property string $email_provider
 * @property string $upper
 * @property string $lower
 */
class Provider extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'provider';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('provider_name, email_provider, id_type', 'required'),
                        array('upper, lower', 'numerical','max'=>30,'min'=>-30),
			array('provider_name, email_provider', 'length', 'max'=>45),
                        array('id_type', 'numerical', 'integerOnly'=>true),
                        array('email_provider','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_provider, provider_name, email_provider,id_type, upper, lower', 'safe', 'on'=>'search'),
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
                    'idType' => array(self::BELONGS_TO, 'Type', 'id_type'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_provider' => Yii::t('database','Id Provider'),
			'provider_name' => Yii::t('database','Provider Name'),
			'email_provider' => Yii::t('database','Email Provider'),
			'upper' => Yii::t('database','Upper'),
			'lower' => Yii::t('database','Lower'),
                        'id_type' => Yii::t('database','Id Type'),
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

		$criteria->compare('id_provider',$this->id_provider);
		$criteria->compare('provider_name',$this->provider_name,true);
		$criteria->compare('email_provider',$this->email_provider,true);
		$criteria->compare('upper',$this->upper);
		$criteria->compare('lower',$this->lower);
                $criteria->compare('id_type',$this->id_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Provider the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
