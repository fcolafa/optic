<?php

/**
 * This is the model class for table "frames".
 *
 * The followings are the available columns in table 'frames':
 * @property integer $id_frame
 * @property integer $id_examplar
 * @property integer $id_mark
 * @property string $frame_name
 *
 * The followings are the available model relations:
 * @property Examplar $idExamplar
 * @property Mark $idMark
 * @property Sales[] $sales
 */
class Frames extends CActiveRecord
{
        public $_examplarname;
        public $_markname;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'frames';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_examplar, id_mark, amount', 'required'),
			array('id_examplar, id_mark,critical_stock', 'numerical', 'integerOnly'=>true),
                        array('frame_name', 'length', 'max'=>45),
                        array('critical_stock','compare','compareAttribute'=>'amount','operator'=>'<=','message'=>' el stock critico no puede ser mayor a la cantidad de Armazones'),
                        
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('_examplarname,_markname, id_frame, id_examplar, id_mark, frame_name,critical_stock', 'safe', 'on'=>'search'),
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
			'idExamplar' => array(self::BELONGS_TO, 'Examplar', 'id_examplar'),
                        'idMark' => array(self::BELONGS_TO, 'Mark', 'id_mark'),
                        'sales' => array(self::HAS_MANY, 'Sales', 'id_frame'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_frame' => Yii::t('database','Id Frame'),
			'id_examplar' => Yii::t('database','Id Examplar'),
			'id_mark' => Yii::t('database','Id Mark'),
                        'frame_name' => Yii::t('database','Frame Name'),
                    'amount' => Yii::t('database','Amount'),
                    'critical_stock' => Yii::t('database','Critical Stock'),
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
                $criteria->with=array('idExamplar','idMark');
                $criteria->together=true;
		$criteria->compare('id_frame',$this->id_frame);
		$criteria->compare('id_examplar',$this->id_examplar);
		$criteria->compare('id_mark',$this->id_mark);
                $criteria->compare('frame_name',$this->frame_name,true);
               $criteria->compare('amount',$this->amount);
                $criteria->compare('critical_stock',$this->critical_stock);
                $criteria->compare('idExamplar.examplar_name',$this->_examplarname, true);
                $criteria->compare('idMark.mark_name',$this->_markname, true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Frames the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
