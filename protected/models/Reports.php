
<?php

/**
 * Reports class.
 * Reports is the data structure for keeping
 * Reports form data. It is used by the 'Sales' action of 'Sales'.
 */
class Reports extends CFormModel
{
	
	public $reportype;
	public $reportyear;
        public $verifyCode;
        public $datatype;
        public $initdate;
        public $endate;
        public $office;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			
                        array('reportype ', 'required'),
                        array('reportyear','validateyear'),
                        array('office','requiredoffice'),
                        array('initdate','validateinitdate'),
                        array('endate','validatendate'),
                        array('initdate','biggeridate'),
                        array('endate','biggerdate'),
                      
                        array('initdate','havesales'),
                

			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
                        
		);
	}
	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
                        'verifyCode'=>Yii::t('database','Verification Code'),
			'reportype'=> Yii::t('database','Report Type'),
                        'reportyear'=>Yii::t('database','Year'),  
                        'datatype'=>Yii::t('database','Data Type'),
                        'initdate'=>Yii::t('database','Init Date'),
                        'endate'=>Yii::t('database','End Date'),
		);
	}
        public function validatEndate($attribute,$params){
            if(empty($this->endate)&&$this->reportype=='2')
                    $this->addError ('endate', Yii::t ('yii', '{attribute} cannot be blank.',array('{attribute}'=>Yii::t('database','End Date'))));
        }
          public function validateInitdate($attribute,$params){
            if(empty($this->initdate)&&$this->reportype=='2')
                    $this->addError ('initdate', Yii::t ('yii', '{attribute} cannot be blank.',array('{attribute}'=>Yii::t('database','Init Date'))));
        }
        public function validateYear($attribute, $params) {
            if(  empty($this->reportyear)&&$this->reportype=='1')
                $this->addError ('reportyear', Yii::t ('yii', '{attribute} cannot be blank.',array('{attribute}'=>Yii::t('database','Year'))));

        }
        public function requiredOffice($attribute, $params) {
            if(  empty($this->office)&&$this->reportype=='2')
                $this->addError ('office', Yii::t ('yii', '{attribute} cannot be blank.',array('{attribute}'=>Yii::t('database','Office'))));

        }
        public function biggerdate($attribute,$params){
             date_default_timezone_set('America/Santiago');
            $today = date("d/m/Y h:m",time());
            $input = $this->endate;
            if($input>$today  )
                   $this->addError ('endate', Yii::t ('yii', '{attribute} cannot be bigger than today.',array('{attribute}'=>Yii::t('database','End Date'))));
            
        }
        public function biggeridate($attribute,$params){
             date_default_timezone_set('America/Santiago');
            $today = date("d/m/Y h:m",time());
            $input = $this->initdate;
            if($input>$today  )
                   $this->addError ('initdate',  Yii::t ('yii', '{attribute} cannot be bigger than today.',array('{attribute}'=>Yii::t('database','Init Date'))));
            
        }
        public function havesales($attribute,$params){
            $criteria=new CDbCriteria();
            $initdate=Yii::app()->dateFormatter->format('yyyy-MM-dd, hh:mm',$this->initdate);
            $endate=Yii::app()->dateFormatter->format('yyyy-MM-dd, hh:mm',$this->endate);
            $criteria->condition = "date >= '".$initdate."' and date <='".$endate."'";
            $sales=  Sales::model()->findAll($criteria);
            if(count($sales)==0)
                $this->addError ('initdate,endate', 'No hay ventas asociadas en ese rango de tiempo');
        }
      
}