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
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
                            Yii::import('application.extensions.phpmailer.JPhpMailer');
                            $mail = new JPhpMailer;
                            $mail->IsSMTP();
                            $mail->Host = 'smtp.googlemail.com';
                            $mail->Port='465'; 
                            $mail->SMTPSecure = "ssl";
                            $mail->SMTPAuth = true;
                            $mail->Username = 'fco.lafa@gmail.com';
                            $mail->Password = 'badreligion12689';
                            $mail->SetFrom('fco.lafa@gmail.com', 'ñeflen');
                            $mail->Subject = $model->subject;
                            $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!';
                            $mail->MsgHTML('<h1>JUST A TEST!</h1><br>'.$model->body);
                            $provider=  Provider::model()->findbyPk($model->email);
                            $mail->AddAddress($provider->email_provider,$provider->provider_name );

                            if ($mail->send()) {
                                Yii::app()->user->setFlash('notice',"mensaje enviado");
                                $model->verifyCode->refresh();
                            }
                            else {
                                Yii::app()->user->setFlash('error',"error al enviar mensaje");
                            }
			}
		}
                 if(Yii::app()->user->isGuest)
                    $this->redirect(Yii::app()->baseUrl);
                 else
		$this->render('contact',array('model'=>$model));
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
}