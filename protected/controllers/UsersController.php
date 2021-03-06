<?php

class UsersController extends Controller
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
                    
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view'),
				'roles'=>array('Administrador','Supervisor'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'roles'=>array('Control Total'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
                        $model->password = md5($model->password);
                        $model->password_repeat = md5($model->password_repeat);
                        $model->date_create=  date("y/m/d H:i:s");
                        
			if($model->save()){
                                Yii::app()->authManager->assign($model->role,$model->id_user);
				$this->redirect(array('view','id'=>$model->id_user));
                        }
                        $model->password_repeat='';
                        $model->password='';
                        $model->_oldpassword='';
                      
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                   $model->password='';
                   $role=$model->role;

		if(isset($_POST['Users']))
		{
                      
			$model->attributes=$_POST['Users'];
                        $model->password = md5($model->password);
                        $model->password_repeat = md5($model->password_repeat);
                        
                        $model->date_create=  date("y/m/d H:i:s");
                         if($role=="Control Total" && $role != $model->role){
                            $criteria= new CDbCriteria();
                            $criteria->condition = 'role="Control Total" and id_user='.$id; 
                            $user= Users::model()->findAll($criteria);
                        if(count($user)<=1)
                         Yii::app()->user->setFlash('error',Yii::t('validation','No se puede modificar el unico usuario con todos los permisos de acceso'));
                         }else{
                      
			if($model->save()){
                                Yii::app ()->authManager->revoke($model->role,$model->id_user);
                                Yii::app()->authManager->assign($model->role,$model->id_user);
				$this->redirect(array('view','id'=>$model->id_user));
                         }
                }
                       $model->password_repeat='';
                       $model->password='';
                       $model->_oldpassword='';
                     
		}

		$this->render('update',array(
			'model'=>$model,
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
                if($model->role=="Control Total"){
                $criteria= new CDbCriteria();
                $criteria->condition = 'role="Control Total" and id_user='.$id; 
                $user= Users::model()->findAll($criteria);
                if(count($user)<=1)
                      Yii::app()->user->setFlash('error',Yii::t('validation','No se puede borra el unico usuario con todos los permisos de acceso'));
                }else{
                Yii::app ()->authManager->revoke($model->role,$id);
		$model->delete();
                Session::model()->deleteByPk($id);
                }
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
