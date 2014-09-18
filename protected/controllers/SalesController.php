<?php

class SalesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','listclient'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id,$ido)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
                        'ido'=>$ido,
		));
	}
      

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
         *  @param integer $ido the ID of model Office to be filter
	 */
	public function actionCreate($ido)
	{
		$model=new Sales;
                $model->id_office=$ido;

		if(isset($_POST['Sales']))
		{
			$model->attributes=$_POST['Sales'];
                        date_default_timezone_set('America/Santiago');
                        $model->date=  date("y/m/d H:i:s");
                        if($model->price==$model->pay)
                            $model->status=1;
                        else
                            $model->status=0;
                      	if($model->save())
				$this->redirect(array('view','id'=>$model->id_sales,'ido'=>$model->id_office));
		}
		$this->render('create',array(
			'model'=>$model,'ido'=>$ido,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id,$ido)
	{
		$model=$this->loadModel($id);
                $model->id_office=$ido;
                 
                 

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sales']))
		{
			$model->attributes=$_POST['Sales'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_sales,'ido'=>$ido));
		}
                if($model->status==1){
                    Yii::app()->user->setFlash('notice',Yii::t('validation','This sale cannot be updated, because it has finished'));
                    $this->redirect(array('view','id'=>$model->id_sales,'ido'=>$ido));
                }

                 
		$this->render('update',array(
			'model'=>$model,'ido'=>$ido,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
            $model=$this->loadModel($id);
             if($model->status==1){
                    Yii::app()->user->setFlash('notice',Yii::t('validation','This sale cannot be deleted, because it has finished'));
                    $this->redirect(array('view','id'=>$model->id_sales,'ido'=>$model->id_office));
                }else{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        }
	/**
	 * Lists all models.
         * @param integer $ido the ID of model Office to be filter
	 */
	public function actionIndex($ido)
	{
		$dataProvider=new CActiveDataProvider('Sales');
                if($ido!=NULL)
                $dataProvider=new CActiveDataProvider('Sales',array(
                      'criteria'=>array(
                          'condition'=>'id_office='.$ido,
                       )));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,'ido'=>$ido,
		));
	}

	/**
	 * Manages all models.
         *  @param integer $ido the ID of model Office to be filter
	 */
	public function actionAdmin($ido=NULL)
	{
		$model=new Sales('search');
                if($ido!=null){
                   $officename=Office::model()->findByPk($ido);
                   $model->_officename=$officename->office_name;
                }else
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sales']))
			$model->attributes=$_GET['Sales'];

		$this->render('admin',array(
			'model'=>$model,'ido'=>$ido,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sales the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sales::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
        public function actionListClient($term)
        {
         $criteria = new CDbCriteria;
         $criteria->condition = "LOWER(client_name) like LOWER(:term) or LOWER(client_lastname) like LOWER(:term)
         or (client_rut) like LOWER(:term)";
         $criteria->params = array(':term'=> '%'.$_GET['term'].'%');
         $criteria->limit = 30;
         $models = Client::model()->findAll($criteria);
         $arr = array();
         foreach($models as $model)
         {
         $arr[] = array(
         'label'=>($model->client_name.' '.$model->client_lastname.' ('.$model->client_rut.')'), // label for dropdown list
         'value'=>($model->client_name.' '.$model->client_lastname.' ('.$model->client_rut.')'), // value for input field
         'id'=>$model->id_client, // return value from autocomplete
                    );
                }
                echo CJSON::encode($arr);
        }

	/**
	 * Performs the AJAX validation.
	 * @param Sales $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sales-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
