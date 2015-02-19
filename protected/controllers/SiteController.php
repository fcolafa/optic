<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
        
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
                        //component for extension DropDownList Dependient
        
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
          
        
                if(Yii::app()->user->isGuest)
                    $this->redirect(Yii::app()->baseUrl.'/site/login');
                else{
                    $this->render('index');
                }
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact($cuerpo="")
	{
		$model=new ContactForm;
                $model->body=$cuerpo;
                
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
       			if($model->validate())
			{
                            Yii::import('application.extensions.phpmailer.JPhpMailer');
                            $mail = new JPhpMailer;
                            $mail->IsSMTP();
                            if( strpos(Yii::app()->params['adminEmail'],'gmail.com')==true){
                                $mail->Host = 'smtp.googlemail.com';
                                $mail->Port='465'; 
                                $mail->SMTPSecure = "ssl";
                            }
                            elseif( strpos(Yii::app()->params['adminEmail'],'hotmail.com')==true){
                                $mail->Host='smtp.live.com';
                                $mail->Port='587';
                                $mail->SMTPSecure = "tls";    
                            }
                            else
                                Yii::app()->user->setFlash('error',"No existe SMTP para la direccion de correo seleccionada");  
                           
                            
                            $mail->SMTPAuth = true;
                            $mail->Username = Yii::app()->params['adminEmail'];
                            $mail->Password = Yii::app()->params['passwordEmail'];
                            $mail->SetFrom(Yii::app()->params['adminEmail'], Yii::app()->params['adminEmail']);
                            $mail->Subject = $model->subject;
                            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                            $mail->MsgHTML('<h1>Optilens!</h1><br>'.$model->body);
                            $provider=  Provider::model()->findbyPk($model->email);
                            $mail->AddAddress($provider->email_provider,$provider->provider_name );
                            try {
                            if ($mail->send())
                                Yii::app()->user->setFlash('notice',"mensaje enviado");
                            else 
                                Yii::app()->user->setFlash('error',"error al enviar mensaje");                            
                            }
                            catch (Exception $ex) {
                                Yii::app()->user->setFlash('error',"Error de Auntetificacion, verifique email y contraseña en configuracion global");  
                        }
			
		}
                }
                 
                 
                if(Yii::app()->user->isGuest)
                    $this->redirect(Yii::app()->baseUrl);
                 else
		$this->render('contact',array('model'=>$model));
	}
        public function actionGlobalConfig()
        {
            $file = dirname(__FILE__).'../../config/params.inc';
            $content = file_get_contents($file);
            $arr = unserialize(base64_decode($content));
            $model=new GlobalConfig;
            $model->setAttributes($arr);
            if(isset($_POST['GlobalConfig']))
            {
                $model->attributes=$_POST['GlobalConfig'];
                 $config = array(        
                'adminEmail'=>$_POST['GlobalConfig']['adminEmail'],
                'passwordEmail'=>$_POST['GlobalConfig']['passwordEmail'],
                );
                 $str = base64_encode(serialize($config));
                 file_put_contents($file, $str);
                 $model->setAttributes($config);
                 Yii::app()->user->setFlash('notice',"Configuracion Guardada Correctamente ");
                 $this->redirect(Yii::app()->baseUrl.'/site/index');
            }
            $this->render('GlobalConfig',array('model'=>$model));
                
            
        }
   
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
                            $this->redirect(Yii::app()->baseUrl.'/site/index');
				//$this->redirect(Yii::app()->user->returnUrl);
                         
                      
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
        
        public function actionReports(){
            $model=new Reports;
            if(isset($_POST['Reports']))
            {
                $model->attributes=$_POST['Reports'];
                if($model->validate()){
                   if($model->reportype=='1'){
                       
                        $Office= Office::model()->findAll();
                        Yii::app()->request->sendFile('ReporteAnual-'.$model->reportyear .'.xls',  
                        $this->renderPartial('/Sales/excel',array('office'=>$Office,'year'=>$model->reportyear)),true);
                      
                   }
                    elseif($model->reportype=='2')
                        $Office= Office::model()->findByPk($model->office);
                        $initdate=Yii::app()->dateFormatter->format('yyyy/MM/dd, hh:mm',$model->initdate);
                        $endate=Yii::app()->dateFormatter->format('yyyy/MM/dd, hh:mm',$model->endate);
                        Yii::app()->request->sendFile('ReporteDetallado-'.$model->initdate.'al'.$model->endate.'.xls', 
               
                        $this->renderPartial('/Sales/rangexcel',array('office'=>$Office,'initdate'=>$initdate, 'endate'=>$endate)),true);
                    
                }
            }
            $this->render('reports',array('model'=>$model));
        }
        
}