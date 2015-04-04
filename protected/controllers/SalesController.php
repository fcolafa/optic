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
				'roles'=>array('Supervisor'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','listclient','reports','assign','discount'),
				'roles'=>array('Administrador'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete','listclient','reports','assign','discount'),
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
                        $model->date=  date("y-m-d H:i:s");
                        $model->id_user=Yii::app()->user->id;
                        $model->delivered=0;
                      
                       
                      
                        if($model->save()){
                                
                        $this->discount($model);
                    
               
                     $this->redirect(array('view','id'=>$model->id_sales,'ido'=>$model->id_office));
                            }
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
        
        private function discount($model){
              $type="";
              $sqlfr="";
              $frmsg=" ";
            if($model->id_type!=3){
                            if($model->idClient->righteye_sphere== null)
                                $rsphere= "is null";
                             else
                                $rsphere="=".$model->idClient->righteye_sphere;
                            if($model->idClient->righteye_cylinder==null)
                                $rcylinder= "is null";
                            else
                                $rcylinder="=".$model->idClient->righteye_cylinder;
                            if($model->idClient->lefteye_sphere== null)
                                $lsphere= "is null";
                            else
                                $lsphere="=".$model->idClient->lefteye_sphere;
                            if($model->idClient->lefteye_cylinder==null)
                                $lcylinder= "is null";
                            else
                                $lcylinder="=".$model->idClient->lefteye_cylinder;
                            
                             
                            $criteria= new CDbCriteria();
                            $criteria->condition = 'sphere '.$rsphere.' AND cylinder '.$rcylinder .' AND amount>0'; 
                            $criteria2= new CDbCriteria();
                            $criteria2->condition='sphere '.$lsphere.' AND cylinder '.$lcylinder.' AND amount>0'; 
                            
                            $both=false;
                            
                            if($model->id_type==2){
                                $sql = "UPDATE glass SET amount=amount-1 WHERE "; 
                                $sql2="UPDATE glass SET amount=amount-1 WHERE "; 
                                $type="Cristal";
                                $plutype="Cristales";
                                $right=Glass::model()->find($criteria);
                                $left= Glass::model()->find($criteria2); 
                                
                                if(!empty($model->id_frame)){  
                                    $sqlfr="UPDATE frames SET amount=amount-1 WHERE amount>0 and id_frame=".$model->id_frame;
                                    $connection = Yii::app() -> db;
                                    $command = $connection -> createCommand($sqlfr);
                                    if($command -> execute())
                                    $frmsg="<br>Armazon descontado";
                                    else{
                                           $cuerpo=$model->idFrame->frame_name." ,modelo:".$model->idFrame->idExamplar->examplar_name." de ".$model->idFrame->idMark->mark_name;
                                           $frmsg="<br>Arnazon no encontrado, ".CHtml::link("desea solicitar?",array('site/contact','cuerpo'=>$cuerpo,'type'=>3));
                                    }  
                                }
                            }elseif($model->id_type==1)   { 
                                
                              
                                $sql ="UPDATE contact_lenses SET amount=amount-1 WHERE  ";
                                $sql2="UPDATE contact_lenses SET amount=amount-1 WHERE  "; 
                                $type="Lente de Contacto";
                                $plutype="Lentes de Contacto";
                                $right=  ContactLenses::model()->find($criteria);
                                $left= ContactLenses::model()->find($criteria2);  
                             
                            }
                            
                            if(!$right && !$left)
                            {
                                $cuerpo=' Ojo Izquierdo Esfera '.$lsphere.' Cilindro '.$lcylinder."\n";
                                $cuerpo.='Ojo Derecho Esfera= '.$rsphere.' Cilindro='.$rcylinder;
                                Yii::app()->user->setFlash('notice', $plutype." no Encontrados\n". CHtml::link("solicitar ".$plutype,array('site/contact','cuerpo'=>$cuerpo,'type'=>$model->id_type)).$frmsg);
                            }else{
                            if($right && $left){
                                $both=true;
                                Yii::app()->user->setFlash('success',$plutype." descontados de Stock".$frmsg);
                                $sql .=" sphere ".$rsphere." AND cylinder ".$rcylinder;
                                $sql2.=" sphere ".$rsphere." AND cylinder ".$rcylinder;
                            }
                            elseif($right && !$left) {
                                $cuerpo='Esfera '.$lsphere.' Cilindro '.$lcylinder;
                                $sql .= " sphere ".$rsphere." AND cylinder ".$rcylinder;
                                Yii::app()->user->setFlash('notice', $type.' Ojo Derecho Descontado de Stock, desea solicitar '.  CHtml::link($type." Ojo izquierdo?",array('site/contact','cuerpo'=>$cuerpo,'type'=>$model->id_type)).$frmsg);
                                
                            }elseif(!$right && $left){
                                $cuerpo='Esfera '.$rsphere.' Cilindro '.$rcylinder;
                                $sql .= " sphere ".$lsphere." AND cylinder ".$lcylinder;
                                Yii::app()->user->setFlash('notice', $type.' Ojo izquierdo Descontado de Stock, Desea solicitar '. CHtml::link($type." Ojo Derecho?",array('site/contact','cuerpo'=>$cuerpo,'type'=>$model->id_type)).$frmsg);
                            }
                                $connection = Yii::app() -> db;
                                $command = $connection -> createCommand($sql);
                                $command -> execute();
                                if($both){
                                $command = $connection -> createCommand($sql2);
                                $command -> execute();
                                }
           
                            }      
                     }
        }
	public function actionUpdate($id,$ido)
	{
		$model=$this->loadModel($id);
                $model->id_office=$ido;
                $idc=$model->id_client;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sales']))
		{
			$model->attributes=$_POST['Sales'];
			if($model->save()){
                            if($idc!=$model->id_client)
                                $this->discount ($model);
                            
			$this->redirect(array('view','id'=>$model->id_sales,'ido'=>$ido));
                        }
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
                    try{
		$this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax'])){
                    Yii::app()->user->setFlash('success',Yii::t('validation','The element was deleted succesfully'));
                     $this->redirect(array('admin','ido'=>$model->id_office));
                }
                 
            }
            catch(CDbException $e)
            {
                if(!isset($_GET['ajax'])){
                    Yii::app()->user->setFlash('error',Yii::t('validation','Can not delete this item because it have elements asociated it'));
                    $this->redirect(array('admin','ido'=>$model->id_office));
                }
                
            } 
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
         public function actionAssign($id) {
           $model=Sales::model()->findByPk($id);
          if($model->pay==$model->price){
            if($model->delivered==0){
                $model->delivered=1;
                $model->status=1;
            }elseif($model->delivered==1 && Yii::app()->user->checkAccess('Control Total')){
                $model->delivered=0; 
                $model->status=0;
            }elseif($model->delivered==1 && !Yii::app()->user->checkAccess('Control Total'))
            {
                 Yii::app()->user->setFlash('error',Yii::t('validation','No tiene permiso para modificar el estado de entrega del producto'));
            }
            $sql = "UPDATE sales SET delivered=".$model->delivered.", status=".$model->status." WHERE id_sales=".$model->id_sales;
            $connection = Yii::app() -> db;
            $command = $connection -> createCommand($sql);
            $command -> execute();   
         }else
             Yii::app()->user->setFlash('error',Yii::t('validation','No Se Puede Entregar Producto si no se ha cancelado Completamente'));
          $this->redirect(array('view','id'=>$model->id_sales,'ido'=>$model->id_office));
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
