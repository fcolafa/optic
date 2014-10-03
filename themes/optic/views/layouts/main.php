<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
       <link rel="icon" type="image/png" href="<?php echo Yii::app()->theme->baseUrl?>/images/favicon.png" />
</head>

<body>

<div class="container" id="page">

	<div id="topnav">
            <div class="topnav_text"> 
                <?php if( Yii::app()->user->checkAccess('Control Total')){?>
                | <a href='<?php echo $this->createUrl('users/index/'); ?>'>
                <?php echo Yii::t('actions','Manage').' '.Yii::t('database','Users');?></a> 
                <?php } 
                if(!Yii::app()->user->isGuest){?>
                |<a href='<?php echo $this->createUrl('site/logout/'); ?>'> <?php echo Yii::t('actions','Logout')?> (<?php echo Yii::app()->user->name;?>)</a>  
                <?php
                      $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                        'id'=>'dialog-animation',
                        'options'=>array(
                            'title'=>Yii::t('actions','System Alerts'),
                            'autoOpen'=>false,
                            'show'=>array(
                                    'effect'=>'blind',
                                    'duration'=>1000,
                                ),
                            'hide'=>array(
                                    'effect'=>'explode',
                                    'duration'=>500,
                                ),  
                          
                            
                        ),
                    ));
                       $glass=  Glass::model()->findAll('amount<=critical_stock');
                       if(isset($glass)){
                           echo "los siguientes Cristales estan bajo el stock deseado <br>";
                           foreach($glass as $gl){
                           echo CHtml::link( "codigo(".$gl->id_glass.")  Esfera(". $gl->sphere.") Cilindro(".$gl->cylinder.") <br> ",array("glass/view", 'id'=>$gl->id_glass));                          
                           }
                       }
                    $this->endWidget('zii.widgets.jui.CJuiDialog');
                    /** End Widget **/
                    echo CHtml::button(Yii::t('actions','System Alerts'), array(
                       'onclick'=>'$("#dialog-animation").dialog("open"); return false;',
                    ));}else{?>
               | <a href='<?php echo $this->createUrl('site/login/'); ?>'> <?php echo Yii::t('actions','Login') ?></a> 
                <?php }?>                 
            </div>
	</div>
    
	<div id="header">
		 <div id="logo"><img src="<?php echo Yii::app()->theme->baseUrl?>/images/logo.png"></img></div>
	</div><!-- header -->
    <!--
<?php /*$this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Dashboard', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'test')),
                array('label'=>'Theme Pages',
                  'items'=>array(
                    array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
					array('label'=>'Form Elements', 'url'=>array('/site/page', 'view'=>'forms')),
					array('label'=>'Interface Elements', 'url'=>array('/site/page', 'view'=>'interface')),
					array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
					array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
					array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
                  ),
                ),
                array('label'=>'Gii Generated Module',
                  'items'=>array(
                    array('label'=>'Items', 'url'=>array('/theme/index')),
                    array('label'=>'Create Item', 'url'=>array('/theme/create')),
					array('label'=>'Manage Items', 'url'=>array('/theme/admin')),
                  ),
                ),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
    )); */?> --->
	<div id="mainmenu">
            
                    
    
		<?php 
                if (!Yii::app()->user->isGuest){
                    
                    
                $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                            array('label'=>Yii::t('database','Home'), 'url'=>array('/site/index')),
                            array('label'=>Yii::t('database', 'Offices'), 'url'=>array('/office/index')),
                        
                           
            
                        ),
		));
                
                

/** Start Widget **/
                ?>
          
               <?php 
              

                
                }?>
         
	</div> <!--mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                
                
                
                <!-- some validation message -->
        <div class="info" style="text-align: left;">
        <?php $flashMessages=Yii::app()->user->getFlashes();
        if($flashMessages){
            echo '<ul class="flashes">';
            foreach ( $flashMessages as $key =>$message){
                echo '<li><div class="flash-'.$key.'">'. $message . "</div></li>\n";
        }
      echo '</ul>';
            }   
        ?>
        </div>

	<?php echo $content; ?>

        <div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Francisco Lagos.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered();  ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect',
        '$(".info").animate({opacity:1.0},10000).slideUp("slow");',
        CClientScript::POS_READY
        );