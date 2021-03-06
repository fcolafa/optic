<?php

/**
 * This is the model class for table "glass".
 *
 * The followings are the available columns in table 'glass':
 * @property integer $id_glass
 * @property double $sphere
 * @property double $cylinder
 * @property integer $amount
 */
class Glass extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'glass';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('amount','required'),
			array('amount, critical_stock', 'numerical', 'integerOnly'=>true),
			array('sphere, cylinder', 'numerical','max'=>30,'min'=>-30),
                        array('id_glass','validateUnique'),
                        array('id_glass','notnull'),
                        array('critical_stock','compare','compareAttribute'=>'amount','operator'=>'<=','message'=>' el stock critico no puede ser mayor a la cantidad de cristales'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_glass, sphere, cylinder, amount, critical_stock', 'safe', 'on'=>'search'),
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_glass' => Yii::t('database','Id Glass'),
			'sphere' => Yii::t('database','Sphere'),
			'cylinder' => Yii::t('database','Cylinder'),
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

		$criteria->compare('id_glass',$this->id_glass);
		$criteria->compare('sphere',$this->sphere);
		$criteria->compare('cylinder',$this->cylinder);
		$criteria->compare('amount',$this->amount);
                $criteria->compare('amount',$this->critical_stock);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Glass the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function validateUnique($attribute, $params) {
            $criteria=new CDbCriteria();
            if($this->cylinder==NULL)
                $cylinder='is null';
            else
                $cylinder='='.$this->cylinder;
            if($this->sphere==NULL)
                $sphere='is null';
            else
                $sphere='='.$this->sphere;
            if($this->isNewRecord)
                $criteria->condition = "cylinder ".$cylinder." and sphere ".$sphere ;
            else
                $criteria->condition = "cylinder ".$cylinder." and sphere ".$sphere. " and id_glass <> ".$this->id_glass;
            
            $glass=  $this->findAll($criteria);
            if(count($glass)!=0)
                $this->addError ('id_glass', Yii::t ('validation', 'This crystal already exists'));

            
        }
        public function notnull($attribute, $params) {
            if ($this->cylinder==NULL && $this->sphere==null){
                       $this->addError ('cylinder', Yii::t ('validation', 'El cristal debe tener al menos una fuerza designada'));
                       $this->addError ('sphere', Yii::t ('validation', 'El cristal debe tener al menos una fuerza designada'));
        }
        
            }
        
}
