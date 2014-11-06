
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

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			//array('reportype', 'required'),
                        array('reportype ', 'required'),
                        array('reportyear','validateyear'),
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
		);
	}
        public function validateYear($attribute, $params) {
            if(  empty($this->reportyear)&&$this->reportype=='1')
                $this->addError ('reportyear', Yii::t ('yii', '{attribute} cannot be blank.',array('{attribute}'=>Yii::t('database','Year'))));

        }
}