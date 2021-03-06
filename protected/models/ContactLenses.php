<?php

/**
 * This is the model class for table "contact_lenses".
 *
 * The followings are the available columns in table 'contact_lenses':
 * @property integer $id_contactlenses
 * @property integer $id_laboratory
 * @property integer $id_material
 * @property double $base_curve
 * @property integer $dk
 * @property double $sphere
 * @property double $cylinder
 * @property integer $amount
 * @property integer $critical_stock
 * 
 * The followings are the available model relations:
 * @property Laboratory $idLaboratory
 * @property Material $idMaterial
 */
class ContactLenses extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $_materialname;
        public $_laboratoryname;
	public function tableName()
	{
		return 'contact_lenses';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_material, amount', 'required'),
			array('id_laboratory, id_material, id_contactlenses, dk, amount, critical_stock', 'numerical', 'integerOnly'=>true),
			array('base_curve, sphere, cylinder', 'numerical'),
                        array('if_contactlenses','notnull'),
                        array('sphere, cylinder', 'numerical','max'=>30,'min'=>-30),
                        array('sphere, cylinder','validateUnique'),
                        array('critical_stock','compare','compareAttribute'=>'amount','operator'=>'<=','message'=>' el stock critico no puede ser mayor a la cantidad de lentes de contacto'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('_laboratoryname, id_contactlenses, _materialname, id_laboratory, id_material, base_curve, dk, sphere, cylinder, amount, critical_stock', 'safe', 'on'=>'search'),
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
			'idLaboratory' => array(self::BELONGS_TO, 'Laboratory', 'id_laboratory'),
			'idMaterial' => array(self::BELONGS_TO, 'Material', 'id_material'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_contactlenses' => Yii::t('database','Id Contactlenses'),
                        'id_laboratory' => Yii::t('database','Id Laboratory'),
                        'id_material' => Yii::t('database','Id Material'),
			'base_curve' => Yii::t('database','Base Curve'),
			'dk' => Yii::t('database','Dk'),
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
                $criteria->with=array('idMaterial','idLaboratory');
                $criteria->together=true;

		$criteria->compare('id_contactlenses',$this->id_contactlenses);
                $criteria->compare('id_laboratory',$this->id_laboratory);
		$criteria->compare('id_material',$this->id_material);
		$criteria->compare('base_curve',$this->base_curve);
		$criteria->compare('dk',$this->dk);
		$criteria->compare('sphere',$this->sphere);
		$criteria->compare('cylinder',$this->cylinder);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('critical_stock',$this->critical_stock);
                $criteria->compare('idMaterial.material_name',$this->_materialname, true);
                $criteria->compare('idLaboratory.laboratory_name',$this->_laboratoryname, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ContactLenses the static model class
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
            $criteria->condition = "cylinder ".$cylinder." and sphere ".$sphere." and id_material='".$this->id_material. "' ";
            else
            $criteria->condition = "cylinder ".$cylinder." and sphere ".$sphere." and id_material='".$this->id_material. "' AND  id_contactlenses <> ".$this->id_contactlenses;
            $glass=  $this->findAll($criteria);
            if(count($glass)!=0)
                $this->addError ('sphere,cylinder', Yii::t ('validation', 'This Conctact Lense already exists'));

            
        }
          public function notnull($attribute, $params) {
            if ($this->cylinder==NULL && $this->sphere==null){
                       $this->addError ('cylinder', Yii::t ('validation', 'El lente de contacto debe tener al menos una fuerza designada'));
                       $this->addError ('sphere', Yii::t ('validation', 'El lente de contacto debe tener al menos una fuerza designada'));
        }
        
            }
}
