
<?php

/**
 * Reports class.
 * Reports is the data structure for keeping
 * Reports form data. It is used by the 'Sales' action of 'Sales'.
 */
class ImportData extends CFormModel
{
    public $file;
 
    public function rules()
    {
        return array(
            array('file','required'),
            array('file', 'file', 'types'=>'sql, txt, xls'),
           
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
			'file'=> Yii::t('database','File'),
                    
                      
                      
		);
	}
}