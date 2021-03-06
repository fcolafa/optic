<?php

/**
 * This is the model class for table "examplar".
 *
 * The followings are the available columns in table 'examplar':
 * @property integer $id_examplar
 * @property integer $id_mark
 * @property string $examplar_name
 *
 * The followings are the available model relations:
 * @property Mark $idMark
 * @property Frames[] $frames
 */
class Examplar extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
      public $_markname;
	public function tableName()
	{
		return 'examplar';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_mark', 'required'),
			array('id_mark', 'numerical', 'integerOnly'=>true),
			array('examplar_name', 'length', 'max'=>45),
                        array('examplar_name','unique'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('_markname, sid_examplar, id_mark, examplar_name', 'safe', 'on'=>'search'),
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
			'idMark' => array(self::BELONGS_TO, 'Mark', 'id_mark'),
			'frames' => array(self::HAS_MANY, 'Frames', 'id_model'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_examplar' => Yii::t('database','Id Examplar'),
			'id_mark' => Yii::t('database','Id Mark'),
			'examplar_name' => Yii::t('database','Examplar Name'),
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
                $criteria->with=array('idMark');
		$criteria->compare('id_examplar',$this->id_examplar);
		$criteria->compare('id_mark',$this->id_mark);
		$criteria->compare('examplar_name',$this->examplar_name,true);
                 $criteria->compare('idMark.mark_name',$this->_markname, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Examplar the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
